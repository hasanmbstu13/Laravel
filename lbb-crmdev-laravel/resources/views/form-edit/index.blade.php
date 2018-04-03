@extends('layouts.main')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h4 class="header-title m-t-0 m-b-20 pull-left col-sm-4">Create Form</h4>
			<!-- <a href="javascript:void(0)" class="btn btn-info btn-sm add_new_text_area_r pull-left m-r-5" title="Add New Text Area">Add New Text Area</a>-->
			<a href="javascript:void(0)" class="btn btn-info btn-sm add_new_box_r pull-left m-r-5" title="Add New Box">Add New Box</a> <a href="javascript:void(0)" class="btn btn-info btn-sm add_new_field_botton pull-left m-r-5" title="Add New Field">Add New Field</a> <a href="javascript:void(0)" class="btn btn-info btn-sm  pull-right" title="Save">Save</a> 
		</div>
	</div>
	<!-- end row -->
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-2 control-label">Location Selection</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Location Selection</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="5"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-2 control-label">Location Selection</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Location Selection</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="5"></textarea>
							</div>
						</div>
					</div>
					<div id="new_text_area_r"></div>
				</form>
			</div>
			<!-- end row -->
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
	<div class="row p-t-50">
		<div class="col-sm-12">
			<h4 class="header-title m-t-0 m-b-20 pull-left col-sm-4">Create Form2</h4>
			<!-- <a href="javascript:void(0)" class="btn btn-info btn-sm add_new_text_area_r pull-left m-r-5" title="Add New Text Area">Add New Text Area</a>-->
			<a href="javascript:void(0)" class="btn btn-info btn-sm add_new_box_t pull-left m-r-5" title="Add New Box">Add New Box</a> <a href="javascript:void(0)" class="btn btn-info btn-sm add_new_field_top pull-left m-r-5" title="Add New Field">Add New Field</a> <a href="javascript:void(0)" class="btn btn-info btn-sm  pull-right" title="Save">Save</a> 
		</div>
	</div>
	<!-- end row -->
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="col-md-6">
						<div class="form-group">
							<div class="col-md-12">
								<h6>Enter Comment/ text </h6>
								<textarea class="form-control" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<h6>Enter Comment/ text </h6>
								<textarea class="form-control" rows="5"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="col-md-12">
								<h6>Enter Comment/ text </h6>
								<textarea class="form-control" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<h6>Enter Comment/ text </h6>
								<textarea class="form-control" rows="5"></textarea>
							</div>
						</div>
					</div>
					<div id="new_text_area_t"></div>
				</form>
			</div>
			<!-- end row -->
		</div>
		<!-- end col -->
	</div>
	<div id="add_new_text_area_r" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Add New Textarea</h4>
				</div>
				<div class="modal-body clearfix">
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">No of Textarea </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="no_of_textarea" name="company" placeholder="Enter Number" required="required" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal" aria-hidden="true">Add Textarea</button>
				</div>
			</div>
		</div>
	</div>
	<div id="add_new_box_r" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">ADD Box</h4>
				</div>
				<div class="modal-body clearfix">
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">Location Selection</label>
						<div class="col-sm-9">
							<select name="location" id="no_of_box" class="form-control">
								<option value="1">One Cross</option>
								<option value="2">Two Cross</option>
								<option value="3">Three Cross</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">Action</label>
						<div class="col-sm-9">
							<select name="action" id="action" class="form-control">
								<option value="1">Add</option>
								<option value="2">Edit</option>
								<option value="3">Delete</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal" aria-hidden="true">Add Textarea</button>
				</div>
			</div>
		</div>
	</div>
	<div id="add_new_box_t" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">ADD Box</h4>
				</div>
				<div class="modal-body clearfix">
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">Location Selection</label>
						<div class="col-sm-9">
							<select name="location" id="no_of_box_top" class="form-control">
								<option value="1">One Cross</option>
								<option value="2">Two Cross</option>
								<option value="3">Three Cross</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">Action</label>
						<div class="col-sm-9">
							<select name="action" id="action" class="form-control">
								<option value="1">Add</option>
								<option value="2">Edit</option>
								<option value="3">Delete</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal" aria-hidden="true">Add Textarea</button>
				</div>
			</div>
		</div>
	</div>
	<div id="add_new_field_botton" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">ADD Field</h4>
				</div>
				<div class="modal-body clearfix">
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">Field Type</label>
						<div class="col-sm-9">
							<select name="field_type_box" id="field_type_box" class="form-control">
								<option value="1">Field Only</option>
								<option value="2">Field with Drop Down</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">Location Selection</label>
						<div class="col-sm-9">
							<select name="no_of_field" id="no_of_field" class="form-control">
								<option value="1">One Cross</option>
								<option value="2">Two Cross</option>
								<option value="3">Three Cross</option>
								<option value="4">Four Cross</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">Action</label>
						<div class="col-sm-9">
							<select name="action" id="action" class="form-control">
								<option value="1">Add</option>
								<option value="2">Edit</option>
								<option value="3">Delete</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal" aria-hidden="true">Add Textarea</button>
				</div>
			</div>
		</div>
	</div>
	<div id="add_new_field_top" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">ADD Field</h4>
				</div>
				<div class="modal-body clearfix">
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">Field Type</label>
						<div class="col-sm-9">
							<select name="field_type_box" id="field_type_box_top" class="form-control">
								<option value="1">Field Only</option>
								<option value="2">Field with Drop Down</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">Location Selection</label>
						<div class="col-sm-9">
							<select name="no_of_field" id="no_of_field_top" class="form-control">
								<option value="1">One Cross</option>
								<option value="2">Two Cross</option>
								<option value="3">Three Cross</option>
								<option value="4">Four Cross</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">Action</label>
						<div class="col-sm-9">
							<select name="action" id="action" class="form-control">
								<option value="1">Add</option>
								<option value="2">Edit</option>
								<option value="3">Delete</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal" aria-hidden="true">Add Textarea</button>
				</div>
			</div>
		</div>
	</div>
	<div id="add_new_text_area_t" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Add New Textarea</h4>
				</div>
				<div class="modal-body clearfix">
					<div class="form-group row">
						<label for="company" class="col-sm-3 control-label">No of Textarea </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="no_of_textarea_t" name="company" placeholder="Enter Number" required="required" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal" aria-hidden="true">Add Textarea</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')
	@parent
@endsection

@push('child-script')
<script src="{{ asset('js/jquery.app.js') }}"></script>

<script type="text/javascript">
   $(document).ready(function(){
       $('.add_new_text_area_r').click(function(){
           $('#add_new_text_area_r').modal();
       });
   $('.add_new_box_r').click(function(){
           $('#add_new_box_r').modal();
       });
   $('.add_new_box_t').click(function(){
           $('#add_new_box_t').modal();
       });
   $('.add_new_field_botton').click(function(){
           $('#add_new_field_botton').modal();
       });
   $('.add_new_field_top').click(function(){
           $('#add_new_field_top').modal();
       });
       $('#add_new_text_area_r button').click(function(){
           var number = parseInt($('#no_of_textarea').val());
           console.log(number);
           for (counter=1; counter < number+1; counter++) {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-6');
   
             newTextBoxDiv.after().html('<div class="form-group"> <label class="col-md-2 control-label">Text area</label> <div class="col-md-10"> <textarea class="form-control" rows="5"></textarea> </div> </div>');
   
             newTextBoxDiv.appendTo("#new_text_area_r");
           }
       });
   $('#add_new_box_r .btn-info').click(function(){
           var number = parseInt($('#no_of_box').val());
           console.log(number);
           for (counter=1; counter < number+1; counter++) {
   if(number == 1)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-12');
   }
   if(number == 2)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-6');
   }
   if(number == 3)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-4');
   }
   
   
             newTextBoxDiv.after().html('<div class="form-group"> <label class="col-md-2 control-label">Location Selection</label> <div class="col-md-10"> <textarea class="form-control" rows="5"></textarea> </div> </div>');
             newTextBoxDiv.appendTo("#new_text_area_r");
   
   
           }
   $("#new_text_area_r .add_new_box_r").hide();
   var add_more =  '<div class="col-sm-12"><a href="javascript:void(0)" class="btn btn-info btn-sm add_new_box_r pull-left m-r-5  add_more" title="Add New Box">+ </a></div>';
   $(add_more).appendTo("#new_text_area_r");
   $('.add_new_box_r').click(function(){
   $('#add_new_box_r').modal();
   });
       });
   $('#add_new_box_t .btn-info').click(function(){
           var number = parseInt($('#no_of_box_top').val());
           console.log(number);
           for (counter=1; counter < number+1; counter++) {
   if(number == 1)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-12');
   }
   if(number == 2)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-6');
   }
   if(number == 3)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-4');
   }
   
   
             newTextBoxDiv.after().html('<div class="form-group">  <div class="col-md-12"><h6>Enter Comment/ text </h6> <textarea class="form-control" rows="5"></textarea> </div> </div>');
             newTextBoxDiv.appendTo("#new_text_area_t");
   
   
           }
   $("#new_text_area_t .add_new_box_t").hide();
   var add_more =  '<div class="col-sm-12"><a href="javascript:void(0)" class="btn btn-info btn-sm add_new_box_t pull-left m-r-5 add_more" title="Add New Box">+ </a></div>';
   $(add_more).appendTo("#new_text_area_t");
   $('.add_new_box_t').click(function(){
   $('#add_new_box_t').modal();
   });
       });
   $('#add_new_field_botton .btn-info').click(function(){
           var number = parseInt($('#no_of_field').val());
   var field_type_box = parseInt($('#field_type_box').val());
           console.log(number);
   
           for (counter=1; counter < number+1; counter++) {
   if(number == 1)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-12');
   }
   if(number == 2)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-6');
   }
   if(number == 3)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-4');
   }
   if(number == 4)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-3');
   }
   
   
   if(field_type_box == '1')
   {
   if(number == 4)
   {
   newTextBoxDiv.after().html('<div class="form-group"> <label class="col-md-3 control-label">Location Selection</label> <div class="col-md-9"> <input class="form-control" type="text"> </div> </div>');
   }
   else
   {
   newTextBoxDiv.after().html('<div class="form-group"> <label class="col-md-2 control-label">Location Selection</label> <div class="col-md-10"> <input class="form-control" type="text"> </div> </div>');
   }
   
   }
   if(field_type_box == '2')
   {
   
   if(number == 4)
   {
   newTextBoxDiv.after().html('<div class="form-group"> <label class="col-md-3 control-label">Location Selection</label> <div class="col-md-9"> <select name="select"  id="select" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select> </div> </div>');
   }
   else
   {
   newTextBoxDiv.after().html('<div class="form-group"> <label class="col-md-2 control-label">Location Selection</label> <div class="col-md-10"> <select name="select"  id="select" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select> </div> </div>');
   }
   }
   
   newTextBoxDiv.appendTo("#new_text_area_r");
            
           }
   
   $("#new_text_area_r .add_new_field_botton").hide();
   var add_more =  '<div class="col-sm-12"><a href="javascript:void(0)" class="btn btn-info btn-sm add_new_field_botton pull-left m-r-5 add_more" title="Add New Field">+</a></div>';
   $(add_more).appendTo("#new_text_area_r");
   $('.add_new_field_botton').click(function(){
   $('#add_new_field_botton').modal();
   });
       });
   
   
   $('#add_new_field_top .btn-info').click(function(){
           var number = parseInt($('#no_of_field_top').val());
   var field_type_box = parseInt($('#field_type_box_top').val());
           console.log(number);
   
           for (counter=1; counter < number+1; counter++) {
   if(number == 1)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-12');
   }
   if(number == 2)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-6');
   }
   if(number == 3)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-4');
   }
   if(number == 4)
   {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-3');
   }
   
   
   if(field_type_box == '1')
   {
   if(number == 4)
   {
   newTextBoxDiv.after().html('<div class="form-group">  <div class="col-md-12"> <h6>Enter Comment/ text </h6><input class="form-control" type="text"> </div> </div>');
   }
   else
   {
   newTextBoxDiv.after().html('<div class="form-group"> <div class="col-md-12"><h6>Enter Comment/ text </h6><input class="form-control" type="text"> </div> </div>');
   }
   
   }
   if(field_type_box == '2')
   {
   
   if(number == 4)
   {
   newTextBoxDiv.after().html('<div class="form-group"><div class="col-md-12"> <h6>Enter Comment/ text </h6><select name="select"  id="select" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select> </div> </div>');
   }
   else
   {
   newTextBoxDiv.after().html('<div class="form-group"> <div class="col-md-12"> <h6>Enter Comment/ text </h6><select name="select"  id="select" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select> </div> </div>');
   }
   }
   
   newTextBoxDiv.appendTo("#new_text_area_t");
            
           }
   
   $("#new_text_area_t .add_new_field_top").hide();
   var add_more =  '<div class="col-sm-12"><a href="javascript:void(0)" class="btn btn-info btn-sm add_new_field_top pull-left m-r-5 add_more" title="Add New Field">+</a></div>';
   $(add_more).appendTo("#new_text_area_t");
   $('.add_new_field_top').click(function(){
   $('#add_new_field_top').modal();
   });
       });
   
   
       $('.add_new_text_area_t').click(function(){
           $('#add_new_text_area_t').modal();
       });
       $('#add_new_text_area_t button').click(function(){
           var number = parseInt($('#no_of_textarea_t').val());
           console.log(number);
           for (counter=1; counter < number+1; counter++) {
             var newTextBoxDiv = $(document.createElement('div')).attr("class", 'col-md-6');
   
             newTextBoxDiv.after().html('<div class="form-group"> <div class="col-md-12"> <h6>Enter Comment/ text </h6> <textarea class="form-control" rows="5"></textarea> </div> </div>');
   
             newTextBoxDiv.appendTo("#new_text_area_t");
           }
       });
   
       
   });
</script>
@endpush