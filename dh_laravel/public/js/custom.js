$( document ).ready(function() {
  var bodyEl = $("body");
    $(window).on("scroll", function() {
      var scrollTop = $(this).scrollTop() + 600;
      $("section").each(function() {
        var el = $(this),
            className = el.attr("id");
        if (el.offset().top  <= scrollTop) {
          $(this).parents('body').attr("class" , className);
        } else {
        }
      });
    });

    
    var sections = $('section')
      , nav = $('#mainnav')
      , nav_height = nav.outerHeight();
     
    $(window).on('scroll', function () {
      var cur_pos = $(this).scrollTop();
     
      sections.each(function() {
        var top = $(this).offset().top - nav_height,
            bottom = top + $(this).outerHeight();
     
        if (cur_pos >= top && cur_pos <= bottom) {
          nav.find('a').removeClass('active');
          sections.removeClass('active');
     
          $(this).addClass('active');
          nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
        }
      });
    });

    nav.find('a').on('click', function () {
      var $el = $(this)
        , id = $el.attr('href');
     
      $('html, body').animate({
        scrollTop: $(id).offset().top - nav_height
      }, 500);
     
      return false;
    });

});