@extends('layouts.main')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box clearfix">
				<h4 class="col-md-4">Communication Central</h4>
				<div class="pull-right col-md-8">
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="card-box clearfix">
				<div class="pull-left col-md-12">
					<h5 class="col-md-6 pull-left">Country: </h5>
					<h5 class="col-md-6 pull-left">State:</h5>
				</div>
				<div class="pull-left col-md-12">
					<h5 class="col-md-6 pull-right">Business Brokerage Advisor’s Name:</h5>
					<h5 class="col-md-6 pull-right">Client’s  Name: </h5>
				</div>
						<!--<div class="pull-left col-md-6">
							<h5 class="col-md-6 pull-left">Division:Business Brokerage </h5>
							<h5 class="col-md-6 pull-left">Client’s Name: </h5>
						</div>-->
						<div class="pull-right col-md-12">
							<h5 class="col-md-6 pull-right">Lead #</h5>
							<h5 class="col-md-6 pull-right">File #</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="m-t-30">
				<button type="button" class="btn btn-primary pull-left"> Registered</button>
				<div class="clearfix"></div>
			</div>
			<!-- end row -->
			<div class="m-t-30">
				<ul class="nav nav-tabs tabs-colored">
					<li class="active"> 
						<a href="#business_description" data-toggle="tab" aria-expanded="false"> 
							<span class="visible-xs"><i class="fa fa-home"></i></span> 
							<span class="hidden-xs">Advisor’s Profile</span> 
						</a> 
					</li>
				</ul>
				<div class="tab-content m-b-50">
					<div class="tab-pane active" id="business_description">
                      <!--<div class="panel panel-default panel-lead">
                        <div class="panel-body clearfix">
						  <div class="panel-heading clearfix">
                                  <h4 class="panel-title pull-left">Advisor’s Profile</h4>
                          </div>
                        </div>
                    </div>-->
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="panel panel-default panel-lead">
                    			<div class="panel-body clearfix">
                    				<div class="form-col-2 form-col">
                    					<div class="row clearfix">
                    						<div class="col-md-12">
                    							<div class="form-group col-md-6">
                    								<label class="col-md-4 control-label">Company Name:</label>
                    								<div class="col-md-8">
                    									<input type="text" class="form-control"/>
                    								</div>
                    							</div>
                    							<div class="form-group col-md-6">
                    								<label class="col-md-4 control-label">Advisor’s Name:</label>
                    								<div class="col-md-8">
                    									<input type="text" class="form-control"/>
                    								</div>
                    							</div>
                    						</div>
                    					</div>
                    					<div class="row clearfix">
                    						<div class="col-md-12">
                    							<div class="form-group col-md-6">
                    								<label class="col-md-4 control-label">Business Address:</label>
                    								<div class="col-md-8">
                    									<input type="text" class="form-control"/>
                    								</div>
                    							</div>
                    							<div class="form-group col-md-6">
                    								<label class="col-md-4 control-label">Phone:</label>
                    								<div class="col-md-8">
                    									<input type="text" class="form-control"/>
                    								</div>
                    							</div>
                    						</div>
                    					</div>
                    					<div class="row clearfix">
                    						<div class="col-md-12">
                    							<div class="form-group col-md-6">
                    								<label class="col-md-4 control-label">Mobile:</label>
                    								<div class="col-md-8">
                    									<input type="text" class="form-control"/>
                    								</div>
                    							</div>
                    							<div class="form-group col-md-6">
                    								<label class="col-md-4 control-label">Email:</label>
                    								<div class="col-md-8">
                    									<input type="text" class="form-control"/>
                    								</div>
                    							</div>
                    						</div>
                    					</div>
                    					<div class="row clearfix">
                    						<div class="col-md-12">
                    							<div class="form-group col-md-6">
                    								<label class="col-md-4 control-label">Fax:</label>
                    								<div class="col-md-8">
                    									<input type="text" class="form-control"/>
                    								</div>
                    							</div>
                    							<div class="form-group col-md-6">
                    								<label class="col-md-4 control-label">DX:</label>
                    								<div class="col-md-8">
                    									<input type="text" class="form-control"/>
                    								</div>
                    							</div>
                    						</div>
                    					</div>

                    					<!-- Over -->

                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    
                    <div class="tab-pane" id="assessment">
                    	<div class="panel panel-default panel-lead">
                    		<div class="panel-body clearfix">
                    			<div class="panel-heading clearfix">
                    				<h4 class="panel-title">Document Details Insertion</h4>
                    				<p>The following Details to be inserted manually into the document as required.(word or pdf docs)</p>
                    			</div>
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-12">
                    			<div class="panel panel-default panel-lead">
                    				<form class="form-horizontal" role="form">
                    					<div class="panel-heading clearfix">
                    						<h3 class="panel-title"> Cover Letter and general letter:</h3>
                    					</div>

                    					<div class="panel-body clearfix">
                    						<div class="row clearfix">
                    							<div class="form-col form-col-6">
                    								<div class="form-group bgf3">
                    									<div class="col-md-6">
                    										<label class="col-md-6 control-label">Salutation:  </label>
                    										<div class="col-md-6">
                    											<div class="checkbox checkbox-custom checkbox-circle">
                    												<input id="checkbox08" checked="" type="checkbox">
                    												<label for="checkbox08">
                    													Mr
                    												</label>
                    												<input id="checkbox08" checked="" type="checkbox">
                    												<label for="checkbox08">
                    													Mrs
                    												</label>
                    												<input id="checkbox08" checked="" type="checkbox">
                    												<label for="checkbox08">
                    													Ms
                    												</label>
                    											</div>
                    										</div>
                    									</div>
                    									<div class="col-md-6">
                    										<label class="col-md-6 control-label">Advisor’s  Name: </label>
                    										<div class="col-md-6">
                    											<input type="text" class="form-control"/>
                    										</div>
                    									</div>
                    								</div>
                    								<div class="form-group bgf9">
                    									<div class="col-md-6">
                    										<label class="col-md-6 control-label">Address:  </label>
                    										<div class="col-md-6">
                    											<input type="text" class="form-control"/>
                    										</div>
                    									</div>
                    									<div class="col-md-6">
                    										<label class="col-md-6 control-label">Delivery Option:  </label>
                    										<div class="col-md-6">
                    											<div class="checkbox checkbox-custom checkbox-circle">
                    												<input id="checkbox08" checked="" type="checkbox">
                    												<label for="checkbox08">
                    													Email
                    												</label>
                    												<input id="checkbox08" checked="" type="checkbox">
                    												<label for="checkbox08">
                    													Fax
                    												</label>
                    												<input id="checkbox08" checked="" type="checkbox">
                    												<label for="checkbox08">
                    													Mail
                    												</label>
                    											</div>
                    										</div>

                    									</div>
                    								</div>
                    								<div class="form-group bgf9">

                    									<div class="col-md-6">
                    										<label class="col-md-6 control-label">The Recipient:  </label>
                    										<div class="col-md-6">
                    											<input type="text" class="form-control"/>
                    										</div>
                    									</div>
                    									<div class="col-md-6">
                    										<label class="col-md-6 control-label">Email address:  </label>
                    										<div class="col-md-6">
                    											<input type="text" class="form-control"/>
                    										</div>
                    									</div>
                    								</div>
                    								<div class="form-group bgf9">

                    									<div class="col-md-6">
                    										<label class="col-md-6 control-label">Email address:  </label>
                    										<div class="col-md-6 p-l-15">
                    											<input type="text" class="form-control"/>
                    										</div>
                    									</div>
                    									<div class="col-md-6">
                    										<label class="col-md-6 control-label">Email address:  </label>
                    										<div class="col-md-6">
                    											<input type="text" class="form-control"/>
                    										</div>
                    									</div>
                    								</div>
                    								<div class="form-group bgf9">
                    									<div class="col-md-6">
                    										<label class="col-md-6 control-label">Fax Number:  </label>
                    										<div class="col-md-6">
                    											<input type="text" class="form-control"/>
                    										</div>
                    									</div>
                    									<div class="col-md-6">
                    										<label class="col-md-6 control-label">Postal Address:  </label>
                    										<div class="col-md-6">
                    											<input type="text" class="form-control"/>
                    										</div>
                    									</div>
                    								</div>
                    								<div class="form-group bgf9">
                    									<div class="col-md-12">
                    										<label class="col-md-3 control-label">Sales Advice Letter – PDF form:  </label>
                    										<div class="col-md-9">
                    											<input class="filestyle" data-input="false" id="filestyle-3" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1" type="file">
                    											<div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="filestyle-3" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Choose file</span></label></span></div>
                    										</div>
                    									</div>
                    								</div>
                    								<div class="form-group bgf9">
                    									<div class="col-md-12">
                    										<label class="col-md-3 control-label">Purchase Advice Letter – PDF form:  </label>
                    										<div class="col-md-9">
                    											<input class="filestyle" data-input="false" id="filestyle-4" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1" type="file">
                    											<div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="filestyle-4" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Choose file</span></label></span></div>
                    										</div>
                    									</div>
                    								</div>

                    								<div class="form-group bgf9">
                    									<div class="col-md-12">
                    										<label class="col-md-3 control-label">Additional General Documents:  </label>
                    										<div class="col-md-9">
                    											<input class="filestyle" data-input="false" id="filestyle-2" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1" type="file">
                    											<div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="filestyle-2" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Choose file</span></label></span></div>
                    										</div>
                    									</div>
                    								</div>
                    								<div class="form-group bgf9">
                    									<div class="col-md-12">
                    										<label class="col-md-3 control-label">Delivery Option:  </label>
                    										<div class="col-md-9">
                    											<div class="checkbox checkbox-custom checkbox-circle">
                    												<input id="checkbox08" checked="" type="checkbox">
                    												<label for="checkbox08">
                    													Company Profile Marketing
                    												</label>
													<!--<input id="checkbox08"  type="checkbox">
													<label for="checkbox08">
														Company Profile Brokerage
													</label>
													<input id="checkbox08" checked="" type="checkbox">
													<label for="checkbox08">
														Seller’s Profile
													</label>-->
												</div>
											</div>

										</div>
									</div>
									<div class="form-group bgf9">
										<div class="col-md-12">
											<label class="col-md-3 control-label">Additional Specific Attachments:  </label>
											<div class="col-md-9">
												<input class="filestyle" data-input="false" id="filestyle-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1" type="file">
												<div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="filestyle-1" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Choose file</span></label></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="panel-footer clearfix">
							<button type="button" class="btn btn-primary pull-left">  View Correspondence</button>
							<button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Submit to Approval Central</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
</div>
</div>
@endsection


@section('footer')
	@parent
@endsection

@section('footer-script')
	@include('partials.footer-script')
@endsection