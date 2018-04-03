jQuery(document).ready(function(){
  $body = $("body");
  $(document).on({
      ajaxStart: function() { $body.addClass("loading");    },
      ajaxStop: function() { $body.removeClass("loading"); }    
  });
  
   var date = new Date();
   var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
   var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
   jQuery('#datepicker-autoclose').datepicker({
      autoclose: true,
      format: "mm/dd/yyyy",
      todayHighlight: true,
      startDate: today,
      endDate: end
   });  
   jQuery('#datepicker-autoclose').datepicker('setDate', today); 

   function success_message(msg){
      noty({
        layout: "top",
        theme: 'relax',                
        type: 'success',
        text: msg,
        dismissQueue: true, 
        progressBar: true,
        animation: {
          open: {height: 'toggle'},
          close: {height: 'toggle'},
          easing: 'swing',
          speed: 500 
        },
        timeout: 5000
      });       
   }

   function error_message(msg){
      noty({
        layout: "top",
        theme: 'relax',                
        type: 'error',
        text: msg,
        dismissQueue: true, 
        progressBar: true,
        animation: {
          open: {height: 'toggle'},
          close: {height: 'toggle'},
          easing: 'swing',
          speed: 500 
        },
        timeout: 5000
      });       
   }

   function display_errors_msg(response){
      var json = response;
      json = JSON.parse(json);
      var errors = "errors";
      var message = "message";
      $(".validation-errors h3").html('');
      $(".validation-errors ul").html('');
      for (var key in json){
         if(key == message){
             $(".validation-errors h3").append(json[key]);
         }
         if(key == errors){
            var data = json[errors];
            for (var key in data){
               for (var i =0; i < data[key].length; i++){
                  $(".validation-errors ul").append("<li>" + data[key][i] + "</li>");
               }
            }
         }//traverse errors object
      }//end xhr.responseText objet
   }

   // Create prospect through ajax request 
   $('#saveProspect').click(function(e){
      e.preventDefault();
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
         }
      });

      $.ajax({
         type: "POST",
         url: "/store_data_entry",
         data: $("form#createDataEntry").serialize(),
         dataType: 'json',
         success: function(response){
            if(response.status == 'success'){
              console.log(response);
               // success_message(response.msg);
               window.location = response.url;
               var date = jQuery('#datepicker-autoclose').val();
                 //var business = jQuery('#business_type').val();
               var business = $('input[name=business]:checked').val(); 
               var state = jQuery('#state').val();
               var price = jQuery('#price').val();
               var advertisement = jQuery('#advertisement').val();
               var comment = jQuery('#comment').val();
               var phone_no = jQuery('#phone_no').val();

               var table_html = '';
               table_html += '<tr> <td>'+date+'</td> <td>'+state+'</td> <td>'+business+'</td> <td>'+phone_no+'</td> <td>'+price+'</td> <td></td> <td>'+comment+'</td> </tr>';

               jQuery(table_html).appendTo("#data_entry_table tbody"); 

               $(".validation-errors h3").html('');
               $(".validation-errors ul").html('');

               $('form#createDataEntry')[0].reset();

            } else if(response.status == 'error'){
               error_message(response.msg);
            }
         }, // end success function
         error: function(xhr) {
          // console.log(xhr);
          error_message("Sorry can\'t be saved, fixes the above issues");
          display_errors_msg(xhr.responseText); 
          $('body, html').animate({scrollTop:$('form').offset().top}, 'slow');
         }//end error function
      });

   });

});
