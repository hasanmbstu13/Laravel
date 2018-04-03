@extends('layouts.main')

@section('content')
<div class="container main_content">
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box clearfix">
				<h4 class="col-md-4 m-b-0 m-t-5">BUYERS PROFILE </h4>
				<div class="pull-right col-md-8">
					<div class="pull-left m-t-5">Buyer's Name:_ _ _ _ _ _ &nbsp;&nbsp;&nbsp;File Number:_ _ _ _ _ _ &nbsp;&nbsp;&nbsp;Broker Name:_ _ _ _ _ _ &nbsp;&nbsp;&nbsp; </div>
					<div class="pull-right">
						Status – &nbsp;<button type="button" class="btn btn-success"> Open</button>
					</div>  
					<!-- <button type="button" class="btn btn-danger pull-right"> Close</button> -->
				</h5>
			</div>
		</div>
	</div>
</div>
<!-- end row -->
<div class="m-t-30">
	<ul class="nav nav-tabs tabs-colored buyer_profile_tab">
		<li class="active"> 
			<a href="#buyer_profile" data-toggle="tab" aria-expanded="false"> 
				<span class="visible-xs"><i class="fa fa-home"></i></span> 
				<span class="hidden-xs">Buyer Profile</span> 
			</a> 
		</li>
		<li class=""> 
			<a href="#communication_records" data-toggle="tab" aria-expanded="true"> 
				<span class="visible-xs"><i class="fa fa-user"></i></span> 
				<span class="hidden-xs">Communication Records</span> 
			</a> 
		</li>
		<li class=""> 
			<a href="#document_records" data-toggle="tab" aria-expanded="true" class="bg-success"> 
				<span class="visible-xs"><i class="fa fa-user"></i></span> 
				<span class="hidden-xs">Document Records</span> 
			</a> 
		</li>
		<li class=""> 
			<a href="#business_introductions" data-toggle="tab" aria-expanded="true" class="bg-info"> 
				<span class="visible-xs"><i class="fa fa-user"></i></span> 
				<span class="hidden-xs">Business Introductions</span> 
			</a> 
		</li>
		<li class=""> 
			<a href="#business_match" data-toggle="tab" class="bg-success" aria-expanded="true" class="bg-info"> 
				<span class="visible-xs"><i class="fa fa-user"></i></span> 
				<span class="hidden-xs">Business Match</span> 
			</a> 
		</li>
		<li class=""> 
			<a href="#marketing" data-toggle="tab" class="bg-warning" aria-expanded="true" class="bg-info">
				<span class="visible-xs"><i class="fa fa-user"></i></span> 
				<span class="hidden-xs">Marketing (businesses wanted)</span> 
			</a> 
		</li>
		<li class=""> 
			<a href="#action" data-toggle="tab" class="bg-danger" aria-expanded="true" class="bg-info"> 
				<span class="visible-xs"><i class="fa fa-user"></i></span> 
				<span class="hidden-xs">Action</span> 
			</a> 
		</li>
	</ul>
	<div class="tab-content m-b-50">
		<div class="tab-pane active" id="buyer_profile">
			<ul class="nav nav-tabs tabs-colored buyer_profile_tab">
				<li class=""> 
					<a href="#buyer_contact_detail" data-toggle="tab" aria-expanded="false"> 
						<span class="visible-xs"><i class="fa fa-home"></i></span> 
						<span class="hidden-xs">Buyer Contact Detail</span> 
					</a> 
				</li>
				<li class=""> 
					<a href="#purchase_criteria" data-toggle="tab" aria-expanded="true"> 
						<span class="visible-xs"><i class="fa fa-user"></i></span> 
						<span class="hidden-xs">Purchase Criteria</span> 
					</a> 
				</li>
			</ul>
			<div class="tab-content m-b-50">
				<div class="tab-pane" id="buyer_contact_detail">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h3 class="panel-title pull-left">Buyer Contact Detail</h3>
						</div>
						<div class="panel-body">
							<form action="" method="">
								<div class="panel-body clearfix">
									<table class="table table-striped table-bordered m-b-0">
										<tr>
											<th>Salutation</th>
											<td colspan="3">
												<div class="col-md-2">
													<select name="salutation" class="form-control">
														<option value="">Mr.</option>
														<option value="">Mrs.</option>
														<option value="">Miss.</option>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<th>First Name</th>
											<td>
												<input type="text" placeholder="First Name" class="form-control">
											</td>
											<th>Surname</th>
											<td>
												<input type="text" placeholder="Surname" class="form-control">
											</td>
										</tr>
										<tr>
											<th>Address</th>
											<td>
												<input type="text" placeholder="Address" class="form-control">
											</td>
											<th>Suburb</th>
											<td>
												<input type="text" placeholder="Suburb" class="form-control">
											</td>
										</tr>
										<tr>
											<th>State</th>
											<td>
												<select class="form-control">
													<option value="">--- Select State ----</option>
													<option value="">Gujarat</option>
													<option value="">Maharastra</option>
													<option value="">Delhi</option>
												</select>
											</td>
											<th>Postcode</th>
											<td>
												<input type="text" placeholder="Postcode" class="form-control">
											</td>
										</tr>
										<tr>
											<th>Email</th>
											<td>
												<input type="text" placeholder="Email" class="form-control">
											</td>
											<th>Telephone</th>
											<td>
												<input type="text" placeholder="Telephone" class="form-control">
											</td>
										</tr>
										<tr>
											<th>Fax</th>
											<td>
												<input type="text" placeholder="Fax" class="form-control">
											</td>
											<th>Mobile</th>
											<td>
												<input type="text" placeholder="Mobile" class="form-control">
											</td>
										</tr>
										<tr>
											<th>Ratting</th>
											<td>
												<select class="form-control">
													<option value="">--- Please Select ----</option>
													<option value="">1</option>
													<option value="">2</option>
													<option value="">3</option>
												</select>
											</td>
											<th>Status</th>
											<td>
												<select class="form-control">
													<option value="">--- Please Select ----</option>
													<option value="">Active</option>
													<option value="">Deactive</option>
												</select>
											</td>
										</tr>
									</table>
								</div>
								<div class="panel-footer clearfix">
									<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="purchase_criteria">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h3 class="panel-title pull-left">Purchase Criteria</h3>
						</div>
						<div class="panel-body">
							<form action="" method="">
								<div class="panel-body clearfix">
									<table class="table table-striped table-bordered m-b-0">
										<tr>
											<th>Industry Type</th>
											<td colspan="2">
												<select class="form-control">
													<option>-- Please Select ---</option>
													<option>Service</option>
													<option>Retail</option>
													<option>Manufacturing</option>
													<option>Transport</option>
													<option>Distribution</option>
													<option>Wholesale</option>
													<option>Internet</option>
												</select>
											</td>
										</tr>
										<tr>
											<th>Categories Type</th>
											<td colspan="2">
												<select class="form-control">
													<option value="">--- Select State ----</option>
													<option value="">Category 1</option>
													<option value="">Category 2</option>
													<option value="">Category 3</option>
												</select>
											</td>
										</tr>
										<tr>
											<th>Business Model Type</th>
											<td colspan="2">
												<select class="form-control">
													<option value="">--- Select State ----</option>
													<option value="">General Business</option>
													<option value="">Franchise Opportunities</option>
												</select>
											</td>
										</tr>
										<tr>
											<td colspan="3">Preferred Location</td>
										</tr>
										<tr>
											<th>Country</th>
											<td colspan="2">
												<select class="form-control">
													<option>-- Please Select ---</option>
													<option>India</option>
													<option>UK</option>
													<option>USA</option>
												</select>
											</td>
										</tr>
										<tr>
											<th>State</th>
											<td colspan="2">
												<select class="form-control">
													<option value="">--- Select State ----</option>
													<option value="">Gujarat</option>
													<option value="">Maharastra</option>
													<option value="">Delhi</option>
												</select>
											</td>
										</tr>
										<tr>
											<th>City/Town</th>
											<td colspan="2">
												<input type="text" placeholder="City/Town" class="form-control">
											</td>
										</tr>
										<tr>
											<th>Region</th>
											<td colspan="2">
												<input type="text" placeholder="Region" class="form-control">
											</td>
										</tr>
										<tr>
											<th>Suburb</th>
											<td colspan="2">
												<input type="text" placeholder="Suburb" class="form-control">
											</td>
										</tr>
										<tr>
											<th>Post Code</th>
											<td colspan="2">
												<input type="text" placeholder="Post Code" class="form-control">
											</td>
										</tr>
										<tr>
											<td colspan="3">Level of Investment</td>
										</tr>
										<tr>
											<th>Minimum Price</th>
											<td colspan="2">
												<div class="col-md-12">
													<i class="fa fa-usd control-label pull-left" aria-hidden="true"></i>
													<div class="col-md-11">
														<input type="text" placeholder="Minimum Price" class="form-control">
													</div>
												</div>
												<div class="col-md-12">
													<span>
														Please use NUMBERS ONLY! (i.e. No Spaces, commas brackets etc e.g. 500000 or 500000.00)
													</span>
												</div>
											</td>
										</tr>
										<tr>
											<th>Maximum Price</th>
											<td colspan="2">
												<div class="col-md-12">
													<i class="fa fa-usd control-label pull-left" aria-hidden="true"></i>
													<div class="col-md-11">
														<input type="text" placeholder="Maximum Price" class="form-control">
													</div>
												</div>
												<div class="col-md-12">
													<span>
														Please use NUMBERS ONLY! (i.e. No Spaces, commas brackets etc e.g. 500000 or 500000.00)
													</span>
												</div>
											</td>
										</tr>
										<tr>
											<td colspan="3"></td>
										</tr>
										<tr>
											<th colspan="3">How long have you been looking?</th>
										</tr>
										<tr>
											<td colspan="3">
												<input type="text" placeholder="Answer" class="form-control">
											</td>
										</tr>
										<tr>
											<th colspan="3">What types business have you seen?</th>
										</tr>
										<tr>
											<td colspan="3">
												<input type="text" placeholder="Answer" class="form-control">
											</td>
										</tr>
										<tr>
											<th colspan="3">What are the reasons for not having purchased a business?</th>
										</tr>
										<tr>
											<td colspan="3">
												<input type="text" placeholder="Answer" class="form-control">
											</td>
										</tr>
										<tr>
											<th colspan="3">What were wrong with the business you inspected?</th>
										</tr>
										<tr>
											<td colspan="3">
												<input type="text" placeholder="Answer" class="form-control">
											</td>
										</tr>
										<tr>
											<th colspan="3">Are you ready to purchase if a right business is presented to you?</th>
										</tr>
										<tr>
											<td colspan="3">
												<input type="text" placeholder="Answer" class="form-control">
											</td>
										</tr>
										<tr>
											<th colspan="3">How would you finance the business? </th>
										</tr>
										<tr>
											<td colspan="3">
												<input type="text" placeholder="Answer" class="form-control">
											</td>
										</tr>
										<tr>
											<th colspan="3">Would you require finance? And if yes, would use a real estate security? </th>
										</tr>
										<tr>
											<td colspan="3">
												<input type="text" placeholder="Answer" class="form-control">
											</td>
										</tr>
										<tr>
											<th colspan="3">Do you require assistance with the raising of the finance?</th>
										</tr>
										<tr>
											<td colspan="3">
												<input type="text" placeholder="Answer" class="form-control">
											</td>
										</tr>
										<tr>
											<th>Additional Comments:</th>
											<td colspan="3">
												<textarea class="form-control"></textarea>
											</td>
										</tr>
										<tr>
											<th>Status</th>
											<td>
												<div class="radio radio-info radio-inline">
													<input id="critaria_status1" value="Open" name="critaria_status" checked="" type="radio">
													<label for="critaria_status1"> Open </label>
												</div>
												<div class="radio radio-danger radio-inline">
													<input id="critaria_status2" value="Close" name="critaria_status" type="radio">
													<label for="critaria_status2"> Close </label>
												</div>
											</td>
										</tr>
									</table>
								</div>
								<div class="panel-footer clearfix">
									<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="communication_records">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<h3 class="panel-title pull-left">Communication Records</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered m-b-0">
						<thead>
							<tr>
								<th>Date</th>
								<th>Type </th>
								<th>Subject</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>08/14/2017</td>
								<td>Phone Call </td>
								<td>Communication Subject</td>
								<td>
									<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
								</td>
							</tr>
							<tr>
								<td>08/15/2017</td>
								<td>Email </td>
								<td>Communication Subject1</td>
								<td>
									<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
								</td>
							</tr>
							<tr>
								<td>08/14/2017</td>
								<td>Phone Call </td>
								<td>Communication Subject</td>
								<td>
									<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
								</td>
							</tr>
							<tr>
								<td>08/15/2017</td>
								<td>Email </td>
								<td>Communication Subject1</td>
								<td>
									<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="document_records">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<h3 class="panel-title pull-left">Document Records</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered m-b-0">
						<thead>
							<tr>
								<th>Date</th>
								<th>Subject</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>08/15/2017</td>
								<td>Document Name1</td>
								<td>
									<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
								</td>
							</tr>
							<tr>
								<td>08/14/2017</td>
								<td>Document Name</td>
								<td>
									<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
								</td>
							</tr>
							<tr>
								<td>08/15/2017</td>
								<td>Document Name1</td>
								<td>
									<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="business_introductions">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<h3 class="panel-title pull-left">Introduction History</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered m-b-0">
						<thead>
							<tr>
								<th>Date</th>
								<th>Seller's ID</th>
								<th>Seller's Name</th>
								<th>Action Type</th>
								<th>Status</th>
								<th>Ratting</th>
								<th>View Comment</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>08/15/2017</td>
								<td>SAL 2201</td>
								<td>John Deo</td>
								<td>Action</td>
								<td>
									<span class="label label bg-success">Open</span>
								</td>
								<td>5</td>
								<td>
									<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
								</td>
							</tr>  
							<tr>
								<td>08/14/2017</td>
								<td>SAL 22251</td>
								<td>John Deo</td>
								<td>Action</td>
								<td>
									<span class="label label bg-danger">Close</span>
								</td>
								<td>5</td>
								<td>
									<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
								</td>
							</tr>                                
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="business_match">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<h3 class="panel-title pull-left">Business Match</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered m-b-0">
						<thead>
							<tr>
								<th>Date</th>
								<th>Seller's ID</th>
								<th>Seller's Name</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>08/15/2017</td>
								<td>SAL 2201</td>
								<td>John Deo</td>
								<td>
									<span class="label label bg-success">Open</span>
								</td>
								<td>
									<button type="button" class="btn btn-success btn-sm btn-action"><i class="fa fa-eye" aria-hidden="true"></i> Action</button>
								</td>
							</tr>  
							<tr>
								<td>08/14/2017</td>
								<td>SAL 22251</td>
								<td>John Deo</td>
								<td>
									<span class="label label bg-danger">Close</span>
								</td>
								<td>
									<button type="button" class="btn btn-success btn-sm btn-action"><i class="fa fa-eye" aria-hidden="true"></i> Action</button>
								</td>
							</tr>                                
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="marketing">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<h3 class="panel-title pull-left">Business Inquiries</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered m-b-0">
						<thead>
							<tr>
								<th>Date</th>
								<th>Seller's ID</th>
								<th>Business Type</th>
								<th>Seller's Name</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>08/15/2017</td>
								<td>SAL 2201</td>
								<td>Single Business</td>
								<td>John Deo</td>
								<td>
									<span class="label label bg-success">Open</span>
								</td>
								<td>
									<button type="button" class="btn btn-success btn-sm btn-action-inquiries"><i class="fa fa-eye" aria-hidden="true"></i> Action</button>
								</td>
							</tr>  
							<tr>
								<td>08/14/2017</td>
								<td>SAL 22251</td>
								<td>Bulk Business</td>
								<td>John Deo</td>
								<td>
									<span class="label label bg-danger">Close</span>
								</td>
								<td>
									<button type="button" class="btn btn-success btn-sm btn-action-inquiries"><i class="fa fa-eye" aria-hidden="true"></i> Action</button>
								</td>
							</tr>                                
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="action">
			<ul class="nav nav-tabs tabs-colored buyer_profile_tab">
				<li class=""> 
					<a href="#business_introduction" class="bg-warning" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="fa fa-home"></i></span>
						<span class="hidden-xs">Business Introduction</span> 
					</a> 
				</li>
				<li class=""> 
					<a href="#select_letters" class="bg-info" data-toggle="tab" aria-expanded="true"> 
						<span class="visible-xs"><i class="fa fa-user"></i></span> 
						<span class="hidden-xs">Select Letters</span> 
					</a> 
				</li>
			</ul>
			<div class="tab-content m-b-50">
				<div class="tab-pane letters_tab" id="business_introduction">  
					<ul class="nav nav-tabs tabs-colored">
						<li class="">
							<a href="#select_business" class="bg-danger" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span>
								<span class="hidden-xs">Select Business</span> 
							</a> 
						</li>
						<li class=""> 
							<a href="#business_introduction_tab" class="bg-warning" data-toggle="tab" aria-expanded="true"> 
								<span class="visible-xs"><i class="fa fa-user"></i></span> 
								<span class="hidden-xs">Business Introduction</span> 
							</a> 
						</li>
					</ul>
					<div class="tab-content m-b-50">
						<div class="tab-pane my-form-custom lead-selection-form" id="select_business">
							<div class="card-box p-0">
								<div class="row">
									<div class="col-sm-9">
										<h4 class="header-title ">Lead Selection</h4>
									</div>
									<div class="col-sm-3 ">
										<div class="submit_custom">
											<button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-search" aria-hidden="true"></i> Search </button>
										</div>
									</div>
								</div>
							</div>
							<form class="form-horizontal form-validation clearfix" role="form">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group col-sm-12">
											<label class="col-sm-4 control-label">Country</label>
											<div class="col-sm-8 p-l-8 border-left">
												<select class="form-control select2" required>
													<option>United State</option>
													<option>India</option>
													<option>Japan</option>
													<option>China</option>
													<option>Australia</option>
												</select>
												<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
											</div>
											<div class="form-group col-sm-12">
												<label class="col-sm-4 control-label">State</label>
												<div class="col-sm-8 p-l-8 border-left">
													<select class="form-control" required>
														<option>GJ</option>
														<option>MP</option>
														<option>UP</option>
														<option>JM</option>
														<option>MA</option>
													</select>
													<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-sm-4 control-label">City</label>
													<div class="col-sm-8 p-l-8 border-left">
														<select class="form-control">
															<option>Bhavnagar</option>
															<option>Surat</option>
															<option>Ahmedabad</option>
															<option>Vadodra</option>
															<option>Rajkot</option>
														</select>
														<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
													</div>
													<div class="form-group col-sm-12">
														<label class="col-sm-4 control-label">Suburb</label>
														<div class="col-sm-8 p-l-8 border-left">
															<select class="form-control">
																<option>Abbotsbury</option>
																<option> Abbotsford</option>
																<option>Acacia Gardens</option>
																<option>Agnes Banks</option>
																<option>Airds</option>
															</select>
															<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
														</div>
														<div class="form-group col-sm-12">
															<label class="col-sm-4 control-label">Post Code</label>
															<div class="col-sm-8 p-l-8 border-left">
																<input type="text" class="form-control" value="">
															</div>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group col-sm-12">
															<label class="col-sm-4 control-label">Lead Type</label>
															<div class="col-sm-8 p-l-8 border-left">
																<select class="form-control">
																	<option>Warm</option>
																	<option> Cold</option>
																	<option>Referral</option>
																</select>
																<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
															</div>
															<div class="form-group col-sm-12">
																<label class="col-sm-4 control-label">Lead Source</label>
																<div class="col-sm-8 p-l-8 border-left">
																	<select class="form-control">
																		<option>Warm</option>
																		<option> Cold</option>
																		<option>Referral</option>
																	</select>
																	<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
																</div>
																<div class="form-group col-sm-12">
																	<label class="col-sm-4 control-label">Business Type</label>
																	<div class="col-sm-8 p-l-8 border-left">
																		<select class="form-control">
																			<option>General Business</option>
																			<option> Franchise Opportunities</option>
																		</select>
																		<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
																	</div>
																	<div class="form-group col-sm-12">
																		<label class="col-sm-4 control-label">Industry Type</label>
																		<div class="col-sm-8 p-l-8 border-left">
																			<select class="form-control">
																				<option>Retail</option>
																				<option>Service</option>
																				<option>Manufacturing</option>
																				<option>Transport</option>
																				<option>Farming</option>
																				<option>Food</option>
																			</select>
																			<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
																		</div>
																		<div class="form-group col-sm-12">
																			<label class="col-sm-4 control-label">Category</label>
																			<div class="col-sm-8 p-l-8 border-left">
																				<select class="form-control">
																					<option>Category1</option>
																					<option>Category2</option>
																				</select>
																				<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
																			</div>
																		</div>
																		<div class="col-sm-4">
																			<div class="form-group col-sm-12">
																				<label class="col-sm-4 control-label">Price Field Range</label>
																				<div class="col-sm-8 p-l-8 border-left">
																					<select class="form-control">
																						<option>0 - 100</option>
																						<option>100 - 500</option>
																						<option>500 - 1000</option>
																						<option>more than 1000</option>
																					</select>
																					<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
																				</div>
																				<div class="form-group col-sm-12">
																					<label class="col-sm-4 control-label">Broker Leads</label>
																					<div class="col-sm-8 p-l-8 border-left">
																						<select class="form-control">
																							<option>Broker Lead1</option>
																							<option>Broker Lead2</option>
																						</select>
																						<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
																					</div>
																					<div class="form-group col-sm-12">
																						<label class="col-sm-4 control-label">Consultant Leads</label>
																						<div class="col-sm-8 p-l-8 border-left">
																							<select class="form-control">
																								<option>Consultant Lead1</option>
																								<option>Consultant Lead2</option>
																							</select>
																							<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
																						</div>
																						<div class="form-group col-sm-12">
																							<label class="col-sm-4 control-label">Month</label>
																							<div class="col-sm-8 p-l-8 border-left">
																								<select id='gMonth1' class="form-control">
																									<option value=''>--Select Month--</option>
																									<option selected value='1'>Janaury</option>
																									<option value='2'>February</option>
																									<option value='3'>March</option>
																									<option value='4'>April</option>
																									<option value='5'>May</option>
																									<option value='6'>June</option>
																									<option value='7'>July</option>
																									<option value='8'>August</option>
																									<option value='9'>September</option>
																									<option value='10'>October</option>
																									<option value='11'>November</option>
																									<option value='12'>December</option>
																								</select>
																								<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
																							</div>
																							<div class="form-group col-sm-12">
																								<label class="col-sm-4 control-label">Year</label>
																								<div class="col-sm-8 p-l-8 border-left">
																									<select class="form-control">
																										<option>2015</option>
																										<option>2016</option>
																										<option>2017</option>
																										<option>2018</option>
																									</select>
																									<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
																								</div>
																							</div>
																						</div>
																					</form>
																					<div class="card-box clearfix p-0 m-t-10">
																						<div class="col-sm-3 pull-right">
																							<div class="submit_custom">
																								<button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-search" aria-hidden="true"></i> Search </button>
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="tab-pane" id="business_introduction_tab">
																					<ul class="nav nav-tabs tabs-colored">
																						<li class="">
																							<a href="#introductory_business_profile" data-toggle="tab"> 
																								<span class="visible-xs"><i class="fa fa-home"></i></span>
																								<span class="hidden-xs">Introductory Business Profile</span> 
																							</a> 
																						</li>
																						<li class=""> 
																							<a href="#drive_by" data-toggle="tab"> 
																								<span class="visible-xs"><i class="fa fa-user"></i></span> 
																								<span class="hidden-xs">Drive By</span> 
																							</a> 
																						</li>
																						<li class="">
																							<a href="#inspection" data-toggle="tab" class="bg-warning"> 
																								<span class="visible-xs"><i class="fa fa-home"></i></span>
																								<span class="hidden-xs">Inspection</span> 
																							</a> 
																						</li>
																						<li class=""> 
																							<a href="#comprehensive_business_profile" data-toggle="tab" class="bg-custom"> 
																								<span class="visible-xs"><i class="fa fa-user"></i></span> 
																								<span class="hidden-xs">Comprehensive Business Profile</span> 
																							</a> 
																						</li>
																					</ul>
																					<div class="tab-content m-b-50">
																						<div class="tab-pane" id="introductory_business_profile">
																							<div class="panel panel-default">
																								<form action="" method="">
																									<div class="panel-body">
																										<div class="row">
																											<div class="col-md-12">
																												<div class="form-group clearfix">  
																													<div class="col-md-2">
																														<label>Follow-up Date Selection</label>
																													</div>
																													<div class="col-md-3">
																														<div class="input-group">
																															<input class="form-control datepicker-autoclose" type="text" placeholder="Date">
																															<span class="input-group-addon"><i class="mdi mdi-calendar"></i></span>
																														</div>
																													</div>
																												</div>
																												<div class="form-group clearfix">
																													<label class="col-md-2 control-label">Rating </label>
																													<div class="col-md-3">
																														<select class="form-control">
																															<option value="1">1</option>
																															<option value="2">2</option>
																															<option value="3">3</option>
																														</select>
																													</div>
																												</div>
																												<div class="form-group clearfix">
																													<div class="col-md-2">
																														<button type="button" class="btn btn-primary btn-custom m-0 toggle-btn" data="comment1"> Comment</button>
																													</div>
																													<div class="col-md-3">
																														<textarea name="comment" class="form-control toggle-ele toggle-ele-comment1"></textarea>
																													</div>
																												</div>
																											</div>
																										</div>
																									</div>
																									<div class="panel-footer clearfix">
																										<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																									</div>
																								</form>
																							</div>
																						</div>
																						<div class="tab-pane" id="drive_by">
																							<div class="panel panel-default panel-lead">
																								<form action="" method="">
																									<div class="panel-body">
																										<div class="row">
																											<div class="col-md-12">
																												<div class="form-group clearfix">  
																													<div class="col-md-2">
																														<label>Follow-up Date Selection</label>
																													</div>
																													<div class="col-md-3">
																														<div class="input-group">
																															<input class="form-control datepicker-autoclose" type="text" placeholder="Date">
																															<span class="input-group-addon"><i class="mdi mdi-calendar"></i></span>
																														</div>
																													</div>
																												</div>
																												<div class="form-group clearfix">
																													<label class="col-md-2 control-label">Rating </label>
																													<div class="col-md-3">
																														<select class="form-control">
																															<option value="1">1</option>
																															<option value="2">2</option>
																															<option value="3">3</option>
																														</select>
																													</div>
																												</div>
																												<div class="form-group clearfix">
																													<div class="col-md-2">
																														<button type="button" class="btn btn-primary btn-custom m-0 toggle-btn" data="comment2"> Comment</button>
																													</div>
																													<div class="col-md-3">
																														<textarea name="comment" class="form-control toggle-ele toggle-ele-comment2"></textarea>
																													</div>
																												</div>
																											</div>
																										</div>
																									</div>
																									<div class="panel-footer clearfix">
																										<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																									</div>
																								</form>
																							</div>
																						</div>
																						<div class="tab-pane" id="inspection">
																							<div class="panel panel-default panel-lead">
																								<form action="" method="">
																									<div class="panel-body">
																										<div class="row">
																											<div class="col-md-12">
																												<div class="form-group clearfix">  
																													<div class="col-md-2">
																														<label>Follow-up Date Selection</label>
																													</div>
																													<div class="col-md-3">
																														<div class="input-group">
																															<input class="form-control datepicker-autoclose" type="text" placeholder="Date">
																															<span class="input-group-addon"><i class="mdi mdi-calendar"></i></span>
																														</div>
																													</div>
																												</div>
																												<div class="form-group clearfix">
																													<label class="col-md-2 control-label">Rating </label>
																													<div class="col-md-3">
																														<select class="form-control">
																															<option value="1">1</option>
																															<option value="2">2</option>
																															<option value="3">3</option>
																														</select>
																													</div>
																												</div>
																												<div class="form-group clearfix">
																													<div class="col-md-2">
																														<button type="button" class="btn btn-primary btn-custom m-0 toggle-btn" data="comment3"> Comment</button>
																													</div>
																													<div class="col-md-3">
																														<textarea name="comment" class="form-control toggle-ele toggle-ele-comment3"></textarea>
																													</div>
																												</div>
																											</div>
																										</div>
																									</div>
																									<div class="panel-footer clearfix">
																										<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																									</div>
																								</form>
																							</div>
																						</div>
																						<div class="tab-pane" id="comprehensive_business_profile">
																							<div class="panel panel-default panel-lead">
																								<form action="" method="">
																									<div class="panel-body">
																										<div class="row">
																											<div class="col-md-12">
																												<div class="form-group clearfix">  
																													<div class="col-md-2">
																														<label>Follow-up Date Selection</label>
																													</div>
																													<div class="col-md-3">
																														<div class="input-group">
																															<input class="form-control datepicker-autoclose" type="text" placeholder="Date">
																															<span class="input-group-addon"><i class="mdi mdi-calendar"></i></span>
																														</div>
																													</div>
																												</div>
																												<div class="form-group clearfix">
																													<label class="col-md-2 control-label">Rating </label>
																													<div class="col-md-3">
																														<select class="form-control">
																															<option value="1">1</option>
																															<option value="2">2</option>
																															<option value="3">3</option>
																														</select>
																													</div>
																												</div>
																												<div class="form-group clearfix">
																													<div class="col-md-2">
																														<button type="button" class="btn btn-primary btn-custom m-0 toggle-btn" data="comment4"> Comment</button>
																													</div>
																													<div class="col-md-3">
																														<textarea name="comment" class="form-control toggle-ele toggle-ele-comment4"></textarea>
																													</div>
																												</div>
																											</div>
																										</div>
																									</div>
																									<div class="panel-footer clearfix">
																										<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																									</div>
																								</form>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="tab-pane letters_tab" id="select_letters">
																			<ul class="nav nav-tabs tabs-colored">
																				<li class="">
																					<a href="#welcome_letter" data-toggle="tab"> 
																						<span class="visible-xs"><i class="fa fa-home"></i></span>
																						<span class="hidden-xs">Welcome Letter</span> 
																					</a> 
																				</li>
																				<li class=""> 
																					<a href="#review_letter" data-toggle="tab"> 
																						<span class="visible-xs"><i class="fa fa-user"></i></span> 
																						<span class="hidden-xs">Review Letter</span> 
																					</a> 
																				</li>
																				<li class="">
																					<a href="#survey_letter" data-toggle="tab" class="bg-warning"> 
																						<span class="visible-xs"><i class="fa fa-home"></i></span>
																						<span class="hidden-xs">Survey Letter</span> 
																					</a> 
																				</li>
																				<li class=""> 
																					<a href="#buyer_progress_update" data-toggle="tab" class="bg-success"> 
																						<span class="visible-xs"><i class="fa fa-user"></i></span> 
																						<span class="hidden-xs">Buyer's Progress Update</span> 
																					</a> 
																				</li>
																				<li class=""> 
																					<a href="#request_for_info_letter" data-toggle="tab" class="bg-danger"> 
																						<span class="visible-xs"><i class="fa fa-user"></i></span> 
																						<span class="hidden-xs">Request For Info Letter</span> 
																					</a> 
																				</li>
																				<li class=""> 
																					<a href="#purchase_advice" data-toggle="tab" class="bg-warning"> 
																						<span class="visible-xs"><i class="fa fa-user"></i></span> 
																						<span class="hidden-xs">Purchase Advice</span> 
																					</a> 
																				</li>
																				<li class=""> 
																					<a href="#followup_letter" data-toggle="tab" class="bg-info"> 
																						<span class="visible-xs"><i class="fa fa-user"></i></span> 
																						<span class="hidden-xs">Follow-up Letter</span> 
																					</a> 
																				</li>
																				<li class=""> 
																					<a href="#settlement_letter" data-toggle="tab" class="bg-custom"> 
																						<span class="visible-xs"><i class="fa fa-user"></i></span> 
																						<span class="hidden-xs">Settlement letter</span> 
																					</a> 
																				</li>
																			</ul>
																			<div class="tab-content m-b-50">
																				<div class="tab-pane" id="welcome_letter">
																					<div class="panel panel-default">
																						<div class="panel-heading clearfix">
																							<h3 class="panel-title pull-left">Welcome Letter</h3>
																						</div>
																						<form action="" method="">
																							<div class="panel-body">
																								<div class="row">
																									<div class="col-md-12">
																										<div class="form-group clearfix">  
																											<div class="col-md-2">
																												<label>Status</label>
																											</div>
																											<div class="col-md-10">
																												<div class="radio radio-info radio-inline">
																													<input id="open" value="Open" name="statusq" checked="" type="radio">
																													<label for="open"> Open </label>
																												</div>
																												<div class="radio radio-danger radio-inline">
																													<input id="close" value="Close" name="statusq" type="radio">
																													<label for="close"> Close </label>
																												</div>
																											</div>
																										</div>
																										<div class="form-group clearfix"> 
																											<label class="col-md-12">Description Header</label>
																											<div class="col-md-12">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																										<div class="form-group clearfix">
																											<label class="col-md-2 control-label">Description Header</label>
																											<div class="col-md-10">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="panel-footer clearfix">
																								<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																							</div>
																						</form>
																					</div>
																				</div>
																				<div class="tab-pane" id="review_letter">
																					<div class="panel panel-default">
																						<div class="panel-heading clearfix">
																							<h3 class="panel-title pull-left">Review Letter</h3>
																						</div>
																						<form action="" method="">
																							<div class="panel-body">
																								<div class="row">
																									<div class="col-md-12">
																										<div class="form-group clearfix">  
																											<div class="col-md-2">
																												<label>Status</label>
																											</div>
																											<div class="col-md-10">
																												<div class="radio radio-info radio-inline">
																													<input id="open" value="Open" name="statusq" checked="" type="radio">
																													<label for="open"> Open </label>
																												</div>
																												<div class="radio radio-danger radio-inline">
																													<input id="close" value="Close" name="statusq" type="radio">
																													<label for="close"> Close </label>
																												</div>
																											</div>
																										</div>
																										<div class="form-group clearfix"> 
																											<label class="col-md-12">Description Header</label>
																											<div class="col-md-12">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																										<div class="form-group clearfix">
																											<label class="col-md-2 control-label">Description Header</label>
																											<div class="col-md-10">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="panel-footer clearfix">
																								<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																							</div>
																						</form>
																					</div>
																				</div>
																				<div class="tab-pane" id="buyer_progress_update">
																					<div class="panel panel-default">
																						<div class="panel-heading clearfix">
																							<h3 class="panel-title pull-left">Buyer Progress Update</h3>
																						</div>
																						<form action="" method="">
																							<div class="panel-body">
																								<div class="row">
																									<div class="col-md-12">
																										<div class="form-group clearfix">  
																											<div class="col-md-2">
																												<label>Status</label>
																											</div>
																											<div class="col-md-10">
																												<div class="radio radio-info radio-inline">
																													<input id="open" value="Open" name="statusq" checked="" type="radio">
																													<label for="open"> Open </label>
																												</div>
																												<div class="radio radio-danger radio-inline">
																													<input id="close" value="Close" name="statusq" type="radio">
																													<label for="close"> Close </label>
																												</div>
																											</div>
																										</div>
																										<div class="form-group clearfix"> 
																											<label class="col-md-12">Description Header</label>
																											<div class="col-md-12">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																										<div class="form-group clearfix">
																											<label class="col-md-2 control-label">Description Header</label>
																											<div class="col-md-10">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="panel-footer clearfix">
																								<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																							</div>
																						</form>
																					</div>
																				</div>
																				<div class="tab-pane" id="request_for_info_letter">
																					<div class="panel panel-default">
																						<div class="panel-heading clearfix">
																							<h3 class="panel-title pull-left">Request For Info Letter</h3>
																						</div>
																						<form action="" method="">
																							<div class="panel-body">
																								<div class="row">
																									<div class="col-md-12">
																										<div class="form-group clearfix">  
																											<div class="col-md-2">
																												<label>Status</label>
																											</div>
																											<div class="col-md-10">
																												<div class="radio radio-info radio-inline">
																													<input id="open" value="Open" name="statusq" checked="" type="radio">
																													<label for="open"> Open </label>
																												</div>
																												<div class="radio radio-danger radio-inline">
																													<input id="close" value="Close" name="statusq" type="radio">
																													<label for="close"> Close </label>
																												</div>
																											</div>
																										</div>
																										<div class="form-group clearfix"> 
																											<label class="col-md-12">Description Header</label>
																											<div class="col-md-12">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																										<div class="form-group clearfix">
																											<label class="col-md-2 control-label">Description Header</label>
																											<div class="col-md-10">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="panel-footer clearfix">
																								<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																							</div>
																						</form>
																					</div>
																				</div>
																				<div class="tab-pane" id="purchase_advice">
																					<div class="panel panel-default">
																						<div class="panel-heading clearfix">
																							<h3 class="panel-title pull-left">Purchase Advice</h3>
																						</div>
																						<form action="" method="">
																							<div class="panel-body">
																								<div class="row">
																									<div class="col-md-12">
																										<div class="form-group clearfix">  
																											<div class="col-md-2">
																												<label>Status</label>
																											</div>
																											<div class="col-md-10">
																												<div class="radio radio-info radio-inline">
																													<input id="open" value="Open" name="statusq" checked="" type="radio">
																													<label for="open"> Open </label>
																												</div>
																												<div class="radio radio-danger radio-inline">
																													<input id="close" value="Close" name="statusq" type="radio">
																													<label for="close"> Close </label>
																												</div>
																											</div>
																										</div>
																										<div class="form-group clearfix"> 
																											<label class="col-md-12">Description Header</label>
																											<div class="col-md-12">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																										<div class="form-group clearfix">
																											<label class="col-md-2 control-label">Description Header</label>
																											<div class="col-md-10">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="panel-footer clearfix">
																								<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																							</div>
																						</form>
																					</div>
																				</div>
																				<div class="tab-pane" id="followup_letter">
																					<div class="panel panel-default">
																						<div class="panel-heading clearfix">
																							<h3 class="panel-title pull-left">Follow-Up Letter</h3>
																						</div>
																						<form action="" method="">
																							<div class="panel-body">
																								<div class="row">
																									<div class="col-md-12">
																										<div class="form-group clearfix">  
																											<div class="col-md-2">
																												<label>Status</label>
																											</div>
																											<div class="col-md-10">
																												<div class="radio radio-info radio-inline">
																													<input id="open" value="Open" name="statusq" checked="" type="radio">
																													<label for="open"> Open </label>
																												</div>
																												<div class="radio radio-danger radio-inline">
																													<input id="close" value="Close" name="statusq" type="radio">
																													<label for="close"> Close </label>
																												</div>
																											</div>
																										</div>
																										<div class="form-group clearfix"> 
																											<label class="col-md-12">Description Header</label>
																											<div class="col-md-12">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																										<div class="form-group clearfix">
																											<label class="col-md-2 control-label">Description Header</label>
																											<div class="col-md-10">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="panel-footer clearfix">
																								<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																							</div>
																						</form>
																					</div>
																				</div>
																				<div class="tab-pane" id="settlement_letter">
																					<div class="panel panel-default">
																						<div class="panel-heading clearfix">
																							<h3 class="panel-title pull-left">Settlement Letter</h3>
																						</div>
																						<form action="" method="">
																							<div class="panel-body">
																								<div class="row">
																									<div class="col-md-12">
																										<div class="form-group clearfix">  
																											<div class="col-md-2">
																												<label>Status</label>
																											</div>
																											<div class="col-md-10">
																												<div class="radio radio-info radio-inline">
																													<input id="open" value="Open" name="statusq" checked="" type="radio">
																													<label for="open"> Open </label>
																												</div>
																												<div class="radio radio-danger radio-inline">
																													<input id="close" value="Close" name="statusq" type="radio">
																													<label for="close"> Close </label>
																												</div>
																											</div>
																										</div>
																										<div class="form-group clearfix"> 
																											<label class="col-md-12">Description Header</label>
																											<div class="col-md-12">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																										<div class="form-group clearfix">
																											<label class="col-md-2 control-label">Description Header</label>
																											<div class="col-md-10">
																												<textarea class="form-control" rows="5"></textarea>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="panel-footer clearfix">
																								<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
																							</div>
																						</form>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
  <!-- <div class="m-t-30">
    <ul class="nav nav-tabs tabs-colored buyer_profile_tab">
      <li class=""> 
        <a href="#buyer_contact_detail" data-toggle="tab" aria-expanded="false"> 
          <span class="visible-xs"><i class="fa fa-home"></i></span> 
          <span class="hidden-xs">Buyer Contact Detail</span> 
        </a> 
      </li>
      <li class=""> 
        <a href="#purchase_criteria" data-toggle="tab" aria-expanded="true"> 
          <span class="visible-xs"><i class="fa fa-user"></i></span> 
          <span class="hidden-xs">Purchase Criteria</span> 
        </a> 
      </li>
    </ul>
    <div class="tab-content m-b-50">
      <div class="tab-pane" id="buyer_contact_detail">
        <div class="panel panel-default">
          <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left">Buyer Contact Detail</h3>
          </div>
          <div class="panel-body">
             <form action="" method="">
                <div class="panel-body clearfix">
                   <table class="table table-striped table-bordered m-b-0">
                      <tr>
                         <th>Salutation</th>
                         <td colspan="3">
                            <div class="col-md-2">
                               <select name="salutation" class="form-control">
                                 <option value="">Mr.</option>
                                 <option value="">Mrs.</option>
                                 <option value="">Miss.</option>
                               </select>
                            </div>
                         </td>
                      </tr>
                      <tr>
                         <th>First Name</th>
                         <td>
                            <input type="text" placeholder="First Name" class="form-control">
                         </td>
                         <th>Surname</th>
                         <td>
                            <input type="text" placeholder="Surname" class="form-control">
                         </td>
                      </tr>
                      <tr>
                         <th>Address</th>
                         <td>
                            <input type="text" placeholder="Address" class="form-control">
                         </td>
                         <th>Suburb</th>
                         <td>
                            <input type="text" placeholder="Suburb" class="form-control">
                         </td>
                      </tr>
                      <tr>
                         <th>State</th>
                         <td>
                            <select class="form-control">
                               <option value="">--- Select State ----</option>
                               <option value="">Gujarat</option>
                               <option value="">Maharastra</option>
                               <option value="">Delhi</option>
                            </select>
                         </td>
                         <th>Postcode</th>
                         <td>
                            <input type="text" placeholder="Postcode" class="form-control">
                         </td>
                      </tr>
                      <tr>
                         <th>Email</th>
                         <td>
                            <input type="text" placeholder="Email" class="form-control">
                         </td>
                         <th>Telephone</th>
                         <td>
                            <input type="text" placeholder="Telephone" class="form-control">
                         </td>
                      </tr>
                      <tr>
                         <th>Fax</th>
                         <td>
                            <input type="text" placeholder="Fax" class="form-control">
                         </td>
                         <th>Mobile</th>
                         <td>
                            <input type="text" placeholder="Mobile" class="form-control">
                         </td>
                      </tr>
                      <tr>
                         <th>Ratting</th>
                         <td>
                            <select class="form-control">
                               <option value="">--- Please Select ----</option>
                               <option value="">1</option>
                               <option value="">2</option>
                               <option value="">3</option>
                            </select>
                         </td>
                         <th>Status</th>
                         <td>
                            <select class="form-control">
                               <option value="">--- Please Select ----</option>
                               <option value="">Active</option>
                               <option value="">Deactive</option>
                            </select>
                         </td>
                      </tr>
                   </table>
                </div>
                <div class="panel-footer clearfix">
                  <button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
                </div>
             </form>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="purchase_criteria">
        <div class="panel panel-default">
          <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left">Communication Records</h3>
          </div>
          <div class="panel-body">
            <form action="" method="">
              <div class="panel-body clearfix">
                 <table class="table table-striped table-bordered m-b-0">
                    <tr>
                       <th>Vendor Search</th>
                       <td colspan="2">
                          <input type="text" placeholder="Vendor Search" class="form-control">
                       </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>- OR -</td>
                    </tr>
                    <tr>
                       <th>Country</th>
                       <td colspan="2">
                          <select class="form-control">
                            <option>-- Please Select ---</option>
                            <option>India</option>
                            <option>UK</option>
                            <option>USA</option>
                          </select>
                       </td>
                    </tr>
                    <tr>
                       <th>State</th>
                       <td colspan="2">
                          <select class="form-control" multiple="multiple">
                             <option value="">--- Select State ----</option>
                             <option value="">Gujarat</option>
                             <option value="">Maharastra</option>
                             <option value="">Delhi</option>
                          </select>
                       </td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                    </tr>
                    <tr>
                       <th>Categories</th>
                       <td>
                          <select class="form-control" multiple="multiple">
                             <option value="">--- Select State ----</option>
                             <option value="">Category 1</option>
                             <option value="">Category 2</option>
                             <option value="">Category 3</option>
                          </select>
                       </td>
                       <td>
                         <small>Hold Down ctrl to select multiple categories.<br>Click <a href="javascript:void(0);">Here</a> to reset the categories field</small>
                       </td>
                    </tr>
                    <tr>
                       <th>Minimum Price</th>
                       <td colspan="2">
                          <div class="col-md-12">
                            <i class="fa fa-usd control-label pull-left" aria-hidden="true"></i>
                            <div class="col-md-11">
                              <input type="text" placeholder="Fax" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <span>
                            Please use NUMBERS ONLY! (i.e. No Spaces, commas brackets etc e.g. 500000 or 500000.00)
                            </span>
                          </div>
                       </td>
                    </tr>
                    <tr>
                       <th>Maximum Price</th>
                       <td colspan="2">
                          <div class="col-md-12">
                            <i class="fa fa-usd control-label pull-left" aria-hidden="true"></i>
                            <div class="col-md-11">
                              <input type="text" placeholder="Fax" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <span>
                            Please use NUMBERS ONLY! (i.e. No Spaces, commas brackets etc e.g. 500000 or 500000.00)
                            </span>
                          </div>
                       </td>
                    </tr>
                    <tr>
                       <th>Description & Requirements</th>
                       <td colspan="2">
                          <input type="text" placeholder="Description & Requirements" class="form-control">
                       </td>
                    </tr>
                    <tr>
                       <th>Subject to Finance?</th>
                       <td colspan="2">
                          <div class="radio-inline">
                            <input id="optionno" name="finance" value="option1" checked="" type="radio">
                            <label for="optionno"> No </label>
                          </div>
                          <div class="radio-inline">
                            <input id="optionyes" name="finance" value="option2" type="radio">
                            <label for="optionyes"> Yes </label>
                          </div>
                       </td>
                    </tr>
                 </table>
              </div>
              <div class="panel-footer clearfix">
                <button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div> -->
</div>
</div>
</div>

<!-- Action Model Popup -->
<div id="action_model" class="modal fade modal_full">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Business Match</h4>
			</div>
			<div class="modal-body clearfix">
				<ul class="nav nav-tabs tabs-colored">
					<li class=""> 
						<a href="#model_business_info" data-toggle="tab" aria-expanded="false"> 
							<span class="visible-xs"><i class="fa fa-home"></i></span> 
							<span class="hidden-xs">Business Introduction</span> 
						</a> 
					</li>
					<li class=""> 
						<a href="#model_comment" data-toggle="tab" aria-expanded="true"> 
							<span class="visible-xs"><i class="fa fa-user"></i></span> 
							<span class="hidden-xs">Comment</span> 
						</a> 
					</li>
				</ul>
				<div class="tab-content m-b-50">
					<div class="tab-pane" id="model_business_info">
						<ul class="nav nav-tabs tabs-colored">
							<li class=""> 
								<a href="#introductory_business_profile" class="bg-primary" data-toggle="tab" aria-expanded="false"> 
									<span class="visible-xs"><i class="fa fa-home"></i></span> 
									<span class="hidden-xs">Introductory Business Profile</span> 
								</a> 
							</li>
							<li class=""> 
								<a href="#comprehensive_business_profile" class="bg-success" data-toggle="tab" aria-expanded="true"> 
									<span class="visible-xs"><i class="fa fa-user"></i></span> 
									<span class="hidden-xs">Comprehensive Business Profile</span> 
								</a> 
							</li>
							<li class=""> 
								<a href="#drive_buy" class="bg-info" data-toggle="tab" aria-expanded="true"> 
									<span class="visible-xs"><i class="fa fa-user"></i></span> 
									<span class="hidden-xs">Drive Buy</span> 
								</a> 
							</li>
							<li class=""> 
								<a href="#business_inspection" class="bg-warning" data-toggle="tab" aria-expanded="true"> 
									<span class="visible-xs"><i class="fa fa-user"></i></span> 
									<span class="hidden-xs">Business Inspection</span> 
								</a> 
							</li>
							<li class=""> 
								<a href="#phone_meeting" class="bg-danger" data-toggle="tab" aria-expanded="true"> 
									<span class="visible-xs"><i class="fa fa-user"></i></span> 
									<span class="hidden-xs">Phone Meeting</span> 
								</a> 
							</li>
						</ul>
						<div class="tab-content m-b-50">
							<div class="tab-pane" id="introductory_business_profile">
								introductory_business_profile
							</div>
							<div class="tab-pane" id="comprehensive_business_profile">
								comprehensive_business_profile
							</div>
							<div class="tab-pane" id="drive_buy">
								drive_buy
							</div>
							<div class="tab-pane" id="business_inspection">
								business_inspection
							</div>
							<div class="tab-pane" id="phone_meeting">
								phone_meeting
							</div>
						</div>
					</div>
					<div class="tab-pane" id="model_comment">
						model_comment
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="action_inquiries" class="modal fade modal_full">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Business Inquiries</h4>
			</div>
			<div class="modal-body clearfix">
				<ul class="nav nav-tabs tabs-colored">
					<li class=""> 
						<a href="#inquiries_business_info" data-toggle="tab" aria-expanded="false"> 
							<span class="visible-xs"><i class="fa fa-home"></i></span> 
							<span class="hidden-xs">Business Introduction</span> 
						</a> 
					</li>
					<li class=""> 
						<a href="#inquiries_comment" data-toggle="tab" aria-expanded="true"> 
							<span class="visible-xs"><i class="fa fa-user"></i></span> 
							<span class="hidden-xs">Comment</span> 
						</a> 
					</li>
				</ul>
				<div class="tab-content m-b-50">
					<div class="tab-pane" id="inquiries_business_info">
						<ul class="nav nav-tabs tabs-colored">
							<li class=""> 
								<a href="#inq_introductory_business_profile" class="bg-primary" data-toggle="tab" aria-expanded="false"> 
									<span class="visible-xs"><i class="fa fa-home"></i></span> 
									<span class="hidden-xs">Introductory Business Profile</span> 
								</a> 
							</li>
							<li class=""> 
								<a href="#inq_comprehensive_business_profile" class="bg-success" data-toggle="tab" aria-expanded="true"> 
									<span class="visible-xs"><i class="fa fa-user"></i></span> 
									<span class="hidden-xs">Comprehensive Business Profile</span> 
								</a> 
							</li>
							<li class=""> 
								<a href="#inq_drive_buy" class="bg-info" data-toggle="tab" aria-expanded="true"> 
									<span class="visible-xs"><i class="fa fa-user"></i></span> 
									<span class="hidden-xs">Drive Buy</span> 
								</a> 
							</li>
							<li class=""> 
								<a href="#inq_business_inspection" class="bg-warning" data-toggle="tab" aria-expanded="true"> 
									<span class="visible-xs"><i class="fa fa-user"></i></span> 
									<span class="hidden-xs">Business Inspection</span> 
								</a> 
							</li>
							<li class=""> 
								<a href="#inq_phone_meeting" class="bg-danger" data-toggle="tab" aria-expanded="true"> 
									<span class="visible-xs"><i class="fa fa-user"></i></span> 
									<span class="hidden-xs">Phone Meeting</span> 
								</a> 
							</li>
						</ul>
						<div class="tab-content m-b-50">
							<div class="tab-pane" id="inq_introductory_business_profile">
								inq_introductory_business_profile
							</div>
							<div class="tab-pane" id="inq_comprehensive_business_profile">
								inq_comprehensive_business_profile
							</div>
							<div class="tab-pane" id="inq_drive_buy">
								inq_drive_buy
							</div>
							<div class="tab-pane" id="inq_business_inspection">
								inq_business_inspection
							</div>
							<div class="tab-pane" id="inq_phone_meeting">
								inq_phone_meeting
							</div>
						</div>
					</div>
					<div class="tab-pane" id="inquiries_comment">
						inquiries_comment
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection

@section('footer-script')
	@parent
@endsection