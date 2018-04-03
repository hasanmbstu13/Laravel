@extends('layouts.main')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="card-box clearfix">
            <h4 class="col-md-4">Data Entry</h4>
         </div>
      </div>
    </div>
   <div class="row">
      <div class="col-md-4">
         <div class="panel panel-default data_entry_form">
            <div class="panel-heading clearfix">
               <h3 class="panel-title pull-left" >ENTER PROSPECTS</h3>
            </div>
            {!! Form::open(['id'=>'createDataEntry', 'method'=>'POST']) !!}
               <div class="panel-body clearfix">
                  <table class="table table-striped table-bordered m-b-0">
                     <tr>
                        <th>Date</th>
                        <td>
                           <div class="input-group date" data-provide="datepicker">
                              <input name="date" id="datepicker-autoclose" class="form-control" type="text" placeholder="Date">
                              <span class="input-group-addon"><i class="mdi mdi-calendar"></i></span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th>Business</th>
                        <td>
                           <div class="radio radio-info">
                              <input id="inlineRadio1" value="Single Business" name="business" checked="" type="radio">
                              <label for="inlineRadio1"> Single Business </label>
                          </div>
                          <div class="radio radio-danger">
                              <input id="inlineRadio2" value="Bulk Business" name="business" type="radio">
                              <label for="inlineRadio2"> Bulk Business </label>
                          </div>
                        </td>
                     </tr>
                     <tr>
                        <th>Lead Source</th>
                        <td>
                           {{ Form::select('lead_source', $warms, null, ['class' => 'form-control selectpicker']) }}
                        </td>
                     </tr>
                     <tr>
                        <th colspan="2">Location</th>
                     </tr>
                     <tr>
                        <th>Country</th>
                        <td>
                            {{ Form::select('country', $all_countries, $selected_country, ['class' => 'form-control selectpicker', 'id' => 'country', 'data-live-search' =>'true']) }}
                        </td>
                     </tr>
                     <tr>
                        <th>State</th>
                        <td class="state">
                           {{ Form::select('state', $all_states, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'id' => 'state', 'title' => 'Select State']) }}
                           {{-- <input name="state" class="form-control" type="text" placeholder="State" id="state"> --}}
                        </td>
                     </tr>
                     <tr>
                        <th>City/Region</th>
                        <td class="city">
                           <select name="city" class="form-control selectpicker" data-live-search="true" id = "city" title = "Select City">
                              {{-- <option value="Warm">Warm</option>
                              <option value="Cold">Cold</option>
                              <option value="Referral">Referral</option> --}}
                           </select>
                           {{-- <input name="city_region" class="form-control" type="text" placeholder="City/Region" id="city"> --}}
                        </td>
                     </tr>
                     <tr>
                        <th>Suburb</th>
                        <td class="suburb">
                           <select name="suburb" class="form-control selectpicker" data-live-search="true" id = "suburb" title="Select Suburb">
                              {{-- <option value="Warm">Warm</option>
                              <option value="Cold">Cold</option>
                              <option value="Referral">Referral</option> --}}
                           </select>
                           {{-- <input name="suburb" class="form-control" type="text" placeholder="Suburb"> --}}
                        </td>
                     </tr>
                     <tr>
                        <th>Post Code/Zip Code</th>
                        <td>
                           <input name="post_code" class="form-control" type="text" placeholder="Post Code/Zip Code" id="postcode">
                        </td>
                     </tr>
                     <tr>
                        <th colspan="2">Contact Details</th>
                     </tr>
                     <tr>
                        <th>Phone Number<span class="required">*</span></th>
                        <td>
                           <input name="phone_no" class="form-control" type="text" placeholder="Phone Number" id="phone_no" required="required">
                        </td>

                     </tr>
                     <tr>
                        <th>Mobile Number</th>
                        <td>
                           <input name="mobile_no" class="form-control" type="text" placeholder="Mobile Number" id="mobile_no">
                        </td>
                     </tr>
                     <tr>
                        <th>Fax Number</th>
                        <td>
                           <input name="fax_no" class="form-control" type="text" placeholder="Fax Number">
                        </td>
                     </tr>
                     <tr>
                        <th>Email Address</th>
                        <td>
                           <input name="email" class="form-control" type="email" placeholder="Email Address" id="email">
                        </td>
                     </tr>
                     <tr>
                        <th colspan="2" height="33"></th>
                     </tr>
                     <tr>
                        <th>Industry Type</th>
                        <td>
                           {{ Form::select('industry_type', $industries, null, ['class' => 'form-control selectpicker']) }}
                        </td>
                     </tr>
                     <tr>
                        <th>Business Type </th>
                        <td>
                           {{ Form::select('business_type', $business_types, null, ['id' => 'business', 'class' => 'form-control selectpicker']) }}
                        </td>
                     </tr>
                     <tr>
                        <th>Business Category </th>
                        <td>
                           {{ Form::select('business_category', $business_categories, null, ['class' =>'form-control selectpicker']) }}
                        </td>
                     </tr>
                     <tr>
                        <th>Price Field</th>
                        <td>
                           <input name="price" class="form-control" type="text" placeholder="Price Field" id="price">
                        </td>
                     </tr>
                     <tr>
                        <th colspan="2">Comment Box</th>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <textarea name="comment" class="form-control" placeholder="Comment Box" id="comment"></textarea>
                        </td>
                     </tr>
                      
                  </table>
               </div>
               <div class="panel-footer clearfix">
                 <button type="submit" id="saveProspect" class="btn btn-primary btn-custom pull-right save_form"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE PROSPECT </button>
               </div>
            {!! Form::close() !!}
         </div>
      </div>
      <div class="col-md-8">
         <div class="panel panel-default data_entry_form">
            <div class="panel-heading clearfix">
               <h3 class="panel-title pull-left">DATA ENTRY RECORD</h3>
            </div>
            <form action="" method="">
               <div class="panel-body">
                  <table class="table table-striped table-bordered m-b-0" id="data_entry_table">
                     <thead>
                        <tr>
                           <th>Time</th>
                           <th>State</th>
                           <th>Publication</th>
                           <th>Phone</th>
                           <th>Price</th>
                           <th>Advertisement</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                     </tbody>
                  </table>
               </div>
               <div class="panel-footer clearfix">
                  <button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes</button>
               </div>
            </form>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6 errors-container" style="margin-left: 150px; margin-top: 35px">
            <div class="validation-errors">
               <h3 class="title" style="color:red"></h3>
               <ul class="errors-list" style="color:red"></ul>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
   @parent
@endsection

@push('child-script')
   <script type="text/javascript">
      $(document).ready(function(){
         $("#country").val('{{$selected_country}}');

         function ajax_setup(){
          $.ajaxSetup({
             headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
             }
          });
         }

         function get_data(url='', id=''){
          jQuery.ajax({
             async: true,
             cache: false,
             dataType: 'text',
             url: url,
             success: function(response) 
             {
                $(id).html(response) ;
                $(id).selectpicker('refresh');
                return false; 
             }
          });
         }

         function change_country(){
            var country_id = $("#country").val();

            var url = "{{ route('getstate',':country_id') }}";
            url = url.replace(':country_id', country_id);

           ajax_setup();
           get_data(url, '#state');

            
         }

         function change_state(){
            var state_id = $("#state").val();

            if(isNaN(state_id) && state_id == 'other'){ 
               if(!($('.state').find('.other_state').length > 0)) {               
                  $('.state').append("<input name='other_state' type='text' class='form-control other_state' placeholder = 'Enter a state' />"); 
               
               }else if($('.state').find('.other_state').length > 0){
                  $('.state').find('.other_state').remove();
               }
               // return;

            }

           

            var url = "{{ route('getcity',':state_id') }}";
            url = url.replace(':state_id', state_id);

            ajax_setup();
            get_data(url, '#city');

         }

         function change_city(){
            var city_id = $("#city").val();

            if(isNaN(city_id) && city_id == 'other'){ 
                if(!($('.city').find('.other_city').length > 0)) {              
                  $('.city').append("<input name='other_city' type='text' class='form-control other_city' placeholder = 'Enter a City' />"); 
                 
                 }else if($('.city').find('.other_city').length > 0){
                     $('.city').find('.other_city').remove();
                  }
               // return;

            }

           

            var url = "{{ route('getsuburb',':city_id') }}";
            url = url.replace(':city_id', city_id);

            ajax_setup();
            get_data(url, '#suburb');

         }

         
         function change_suburb(){
            var suburb_id = $("#suburb").val();

            if(isNaN(suburb_id) && suburb_id == 'other'){  
               if(!($('.suburb').find('.other_suburb').length > 0)) {            
                  $('.suburb').append("<input name='other_suburb' type='text' class='form-control other_suburb' placeholder = 'Enter a suburb' />"); 
               }
               return;

            }

            if($('.suburb').find('.other_suburb').length > 0){
               $('.suburb').find('.other_suburb').remove();
            }

         }


         $( "#country" ).change(change_country);
         $( "#state" ).change(change_state);
         $( "#city" ).change(change_city);
         $("#suburb").change(change_suburb);
      });
   </script>
@endpush