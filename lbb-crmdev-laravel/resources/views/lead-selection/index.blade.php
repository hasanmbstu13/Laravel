@extends('layouts.lead-selection-main')

@section('content')
<!-- Page content start -->
<div class="page-contentbar">

    <!-- START PAGE CONTENT -->
    <div id="page-right-content">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="header-title m-t-0 m-b-20">Lead Selection</h4>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="col-sm-12">

                    <div class="row">
						 <div class="card-box">
						   <form class="form-horizontal form-validation" role="form">
						    <div class="col-md-6">
							  <div class="form-group">
								   	<label class="col-sm-3 control-label">Country</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" required>
                                            <option>United State</option>
                                            <option>India</option>
                                            <option>Japan</option>
                                            <option>China</option>
                                            <option>Australia</option>
                                        </select>
									</div>
								 </div>
						    </div>
							
							 <div class="col-md-6">
							  <div class="form-group">
								   	<label class="col-sm-3 control-label">State</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required>
                                            <option>GJ</option>
                                            <option>MP</option>
                                            <option>UP</option>
                                            <option>JM</option>
                                            <option>MA</option>
                                        </select>
									</div>
								 </div>
						    </div>
							
							 <div class="col-md-6">
							  <div class="form-group">
								   	<label class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>Bhavnagar</option>
                                            <option>Surat</option>
                                            <option>Ahmedabad</option>
                                            <option>Vadodra</option>
                                            <option>Rajkot</option>
                                        </select>
									</div>
								 </div>
						    </div>
							
							 <div class="col-md-6">
							  <div class="form-group">
								   	<label class="col-sm-3 control-label">Region</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>Central Coast</option>
                                            <option>Central Tablelands</option>
                                            <option>Central West</option>
                                            <option>Far South Coast</option>
                                            <option>Far West</option>
                                        </select>
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   <label class="col-sm-3 control-label">Suburb</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>Abbotsbury</option>
                                            <option> Abbotsford</option>
                                            <option>Acacia Gardens</option>
                                            <option>Agnes Banks</option>
                                            <option>Airds</option>
                                        </select>
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   	<label class="col-sm-3 control-label">Post Code/Zip Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="">
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   	<label class="col-sm-3 control-label">Phone Prefix</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="">
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   <label class="col-sm-3 control-label">Business Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>General Business</option>
                                            <option> Franchise Opportunities</option>
                                        </select>
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   <label class="col-sm-3 control-label">Lead Source</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>Warm</option>
                                            <option> Cold</option>
                                            <option>Referral</option>
                                        </select>
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   <label class="col-sm-3 control-label">Industry Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>Retail</option>
                                            <option>Service</option>
											<option>Manufacturing</option>
                                            <option>Transport</option>
											<option>Farming</option>
                                            <option>Food</option>
                                        </select>
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   <label class="col-sm-3 control-label">Business Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>Category1</option>
                                            <option>Category2</option>
                                        </select>
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   <label class="col-sm-3 control-label">Business Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>Category1</option>
                                            <option>Category2</option>
                                        </select>
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   <label class="col-sm-3 control-label">Price Field Range</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
										   <option>0 - 100</option>
										   <option>100 - 500</option>
										   <option>500 - 1000</option>
										   <option>more than 1000</option>
										</select>
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   <label class="col-sm-3 control-label">Month</label>
                                    <div class="col-sm-9">
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
									</div>
								 </div>
						    </div>
							
							<div class="col-md-6">
							  <div class="form-group">
								   <label class="col-sm-3 control-label">Year</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
										   <option>2015</option>
										   <option>2016</option>
										   <option>2017</option>
										   <option>2018</option>
										</select>
									</div>
								 </div>
						    </div>
							
								<div class="col-md-12 text-center">
									<div class="form-group row">
										
											<button type="submit" class="btn btn-primary waves-effect waves-light">
												Search
											</button>
											<button type="reset"
													class="btn btn-default waves-effect m-l-5">
												Cancel
											</button>
										
									</div>
								</div>
							</form>
						   <div style="clear: both;" class="clearfix"></div>
						 </div>
					
                    </div> <!--end card box -->
                    <!-- end row -->
					 
						
						
			<div class="row p-t-50">
                <div class="col-sm-12">
                    <div class="m-b-20 table-responsive">

                        <h4 class="m-b-50">Leads Allocation -Tables</h4>
                       

                        <table id="datatable-responsive"
                               class="table table-striped table-bordered dt-responsive nowrap m-t-50" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Location</th>
                                <th>Display Location</th>
                                <th>Leads Source </th>
                                <th>Business Type</th>
                                <th>Industry Type </th>
                                <th>Price Range </th>
                                <th>Placement</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Australia</td>
                                <td>Australia</td>
                                <td>Warm</td>
                                <td>Retail</td>
                                <td>Category1</td>
                                <td>0 - 100</td>
                                <td>test</td>
                              
                            </tr>
							
							<tr>
								<td>Australia</td>
								<td>Australia</td>
								<td>Warm</td>
								<td>Retail</td>
								<td>Category1</td>
								<td>0 - 100</td>
								<td>test</td>
							  
							</tr>
							
							<tr>
								<td>India</td>
								<td>Australia</td>
								<td>Cold</td>
								<td>Service</td>
								<td>Category2</td>
								<td>100 - 500</td>
								<td>test2</td>
							  
							</tr>
							
							<tr>
								<td>Australia</td>
								<td>Australia</td>
								<td>Warm</td>
								<td>Retail</td>
								<td>Category1</td>
								<td>0 - 100</td>
								<td>test</td>
							  
							</tr>
							<tr>
								<td>India</td>
								<td>Australia</td>
								<td>Cold</td>
								<td>Service</td>
								<td>Category2</td>
								<td>100 - 500</td>
								<td>test2</td>
							  
							</tr>
							<tr>
								<td>India</td>
								<td>Australia</td>
								<td>Cold</td>
								<td>Service</td>
								<td>Category2</td>
								<td>100 - 500</td>
								<td>test2</td>
							  
							</tr>
							{{-- <tr>
								<td>Australia</td>
								<td>Australia</td>
								<td>Warm</td>
								<td>Retail</td>
								<td>Category1</td>
								<td>0 - 100</td>
								<td>test</td>
							  
							</tr> --}}
                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			
                    
                    <!-- end row -->

			 
			
            <div class="row p-t-50">
                <div class="col-sm-12">
				   <div class="card-box">
                    <div class="table-responsive">

                        <h4 class="m-b-50">Table 3</h4>
                       
					    <div class="table-responsive">
                        <table 
                              class="table table-hover mails m-0 table table-actions-bar" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></th>
                                <th>Allocation Date</th>
                                <th>Lead ID </th>
                                <th>Business Category</th>
                                <th>Price </th>
                            
                               
                            </tr>
                            </thead>
                            <tbody>
                          <tr>
								<td><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></td>
								<td>2011/07/25</td>
								<td>1</td>
								<td>Category1</td>
								<td>0 - 100</td>
							  
							</tr>
							
							<tr>
								<td><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></td>
								<td>2011/07/25</td>
								<td>2</td>
								<td>Category2</td>
								<td>100 - 500</td>
							  
							</tr>
							
							<tr>
								<td><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></td>
								<td>2011/07/25</td>
								<td>1</td>
								<td>Category1</td>
								<td>0 - 100</td>
							  
							</tr>
							
							<tr>
								<td><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></td>
								<td>2011/07/25</td>
								<td>2</td>
								<td>Category2</td>
								<td>100 - 500</td>
							  
							</tr>
							<tr>
								<td><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></td>
								<td>2011/07/25</td>
								<td>1</td>
								<td>Category1</td>
								<td>0 - 100</td>
							  
							</tr>
							
							<tr>
								<td><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></td>
								<td>2011/07/25</td>
								<td>2</td>
								<td>Category2</td>
								<td>100 - 500</td>
							  
							</tr>
							
							<tr>
								<td><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></td>
								<td>2011/07/25</td>
								<td>1</td>
								<td>Category1</td>
								<td>0 - 100</td>
							  
							</tr>
							
							<tr>
								<td><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></td>
								<td>2011/07/25</td>
								<td>2</td>
								<td>Category2</td>
								<td>100 - 500</td>
							  
							</tr>
							
							<tr>
								<td><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></td>
								<td>2011/07/25</td>
								<td>1</td>
								<td>Category1</td>
								<td>0 - 100</td>
							  
							</tr>
							
							<tr>
								<td><div class="checkbox checkbox-primary"><input id="checkbox2" type="checkbox" checked><label for="checkbox2"></label></div></td>
								<td>2011/07/25</td>
								<td>2</td>
								<td>Category2</td>
								<td>100 - 500</td>
							  
							</tr>

                            </tbody>
                        </table>
						</div>
                    </div>
					</div>
                </div>
            </div>

		    <div class="row p-t-50">
				   <form class="form-horizontal" role="form">
					<div class="col-md-6">
					  <div class="form-group">
							<label class="col-sm-3 control-label">Brokers</label>
							<div class="col-sm-9">
								<select class="form-control select2">
									<option>Broker1</option>
									<option>Broker2</option>
									<option>Broker3</option>
									<option>Broker4</option>
									<option>Broker5</option>
								</select>
							</div>
						 </div>
					</div>
					
					 <div class="col-md-6">
					  <div class="form-group">
							<label class="col-sm-3 control-label">Consultants </label>
							<div class="col-sm-9">
								<select class="form-control">
									<option>Consultant1 </option>
									<option>Consultant2 </option>
									<option>Consultant3 </option>
									<option>Consultant4 </option>
									<option>Consultant5 </option>
								</select>
							</div>
						 </div>
					</div>
					 <div style="clear: both;" class="clearfix"></div>
					</form>
				 
			</div>

                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
        <!-- end container -->
 @endsection