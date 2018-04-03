@extends('layouts.main')

@section('content')
	<div class="container">
	   <div class="row">
	      <div class="col-sm-12">
	         <h4 class="header-title m-t-0 m-b-0">Lead page</h4>
	      </div>
	   </div>
	   <!-- end row -->
	   <div class="m-t-30">
	     <ul class="nav nav-tabs tabs-colored">
	       <li class="active"> 
	         <a href="#business_description" data-toggle="tab" aria-expanded="false"> 
	           <span class="visible-xs"><i class="fa fa-home"></i></span> 
	           <span class="hidden-xs">Business Description</span> 
	         </a> 
	       </li>
	       <li class=""> 
	         <a href="#assessment" data-toggle="tab" aria-expanded="true"> 
	           <span class="visible-xs"><i class="fa fa-user"></i></span> 
	           <span class="hidden-xs">Assessment</span> 
	         </a> 
	       </li>
	       <li class=""> 
	         <a href="#proposal" data-toggle="tab" aria-expanded="true" class="bg-success"> 
	           <span class="visible-xs"><i class="fa fa-user"></i></span> 
	           <span class="hidden-xs">Proposal</span> 
	         </a> 
	       </li>
	       <li class=""> 
	         <a href="#registration" data-toggle="tab" aria-expanded="true" class="bg-info"> 
	           <span class="visible-xs"><i class="fa fa-user"></i></span> 
	           <span class="hidden-xs">Registration</span> 
	         </a> 
	       </li>
	     </ul>
	     <div class="tab-content m-b-50">
	       <div class="tab-pane active" id="business_description">
	         <div class="panel panel-default panel-lead p-t-10">
	           <div class="panel-body clearfix">
	             <div class="col-sm-4">
	               <div class="card-box">
	                  <h6 class="text-muted m-t-0 text-uppercase">Business Description</h6>
	                  <p class=""><span>Suspendisse vel quam malesuada, aliquet sem sit amet, fringilla elit. Morbi tempor tincidunt tempor. Etiam id turpis viverra, vulputate sapien nec, varius sem. Curabitur ullamcorper fringilla eleifend. In ut eros hendrerit est consequat posuere et at velit. Curabitur ullamcorper fringilla eleifend. In ut eros hendrerit est consequat posuere et at velit. Curabitur ullamcorper fringilla eleifend. In ut eros hendrerit est consequat posuere et at velit. Suspendisse vel quam malesuada, aliquet sem sit amet, fringilla elit. Morbi tempor tincidunt tempor. Etiam id turpis viverra. Hidosl</span></p>
	               </div>
	             </div>
	             <div class="col-sm-8">
	               <div class="row">
	                  <div class="col-sm-6">
	                     <div class="card-box">
	                        <h6 class="text-muted m-t-0 text-uppercase">Business Type</h6>
	                        <h3 class="m-b-0 m-t-0"><span>Business</span></h3>
	                     </div>
	                  </div>
	                  <div class="col-sm-6">
	                     <div class="card-box">
	                        <h6 class="text-muted m-t-0 text-uppercase">Industry</h6>
	                        <h3 class="m-b-0 m-t-0"><span>Food</span></h3>
	                     </div>
	                  </div>
	                  <div class="col-sm-6">
	                     <div class="card-box">
	                        <h6 class="text-muted m-t-0 text-uppercase">Location</h6>
	                        <h3 class="m-b-0 m-t-0"><span>Australia</span></h3>
	                     </div>
	                  </div>
	                  <div class="col-sm-6">
	                     <div class="card-box">
	                        <h6 class="text-muted m-t-0 text-uppercase">Contact Name and Phone Numbers</h6>
	                        <h3 class="m-b-0 m-t-0"><span>+91-999999999</span></h3>
	                     </div>
	                  </div>
	                  <div class="col-sm-6">
	                     <div class="card-box">
	                        <h6 class="text-muted m-t-0 text-uppercase">History</h6>
	                        <h3 class="m-b-0 m-t-0"><span>Lorem ipsum</span></h3>
	                     </div>
	                  </div>
	                  <div class="col-sm-6">
	                     <div class="card-box">
	                        <h6 class="text-muted m-t-0 text-uppercase">Lead Type</h6>
	                        <h3 class="m-b-0 m-t-0"><span>Cold</span></h3>
	                     </div>
	                  </div>
	                  <div class="col-sm-12">
	                     <div class="card-box">
	                        <h6 class="text-muted m-t-0 text-uppercase">Consultant Name and Location</h6>
	                        <h3 class="m-b-0 m-t-0"><span>Dummy - Australia</span></h3>
	                     </div>
	                  </div>
	               </div>
	             </div>
	           </div>
	         </div>
	         <div class="row">
	           <div class="col-md-12">
	             <div class="panel panel-default panel-lead">
	               <div class="panel-heading clearfix">
	                   <h3 class="panel-title m-t-10 pull-left">BUSINESS INFORMATION <span>L13808360</span></h3>
	                   <div class="panel-tools pull-right">
	                     <a href="#">Transfer to business partner &gt;&gt;</a>
	                     <button type="button" class="btn btn-primary btn-custom"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
	                   </div>
	               </div>
	               <div class="panel-heading clearfix m-t-10">
	                 <div class="panel-tools pull-right">
	                   <strong class="text-custom">Phone:&nbsp; 0429 463 379</strong>
	                 </div>
	               </div>
	               <form class="form-horizontal" role="form">
	                 <div class="panel-body clearfix">
	                   <div class="form-col-2 form-col">
	                     <div class="row clearfix">
	                       <div class="col-md-12">
	                         <div class="form-group col-md-5">
	                           <label class="col-md-4 control-label">Phone:</label>
	                           <div class="col-md-8">
	                               <input class="form-control" placeholder="Phone " type="text">
	                           </div>
	                         </div>
	                         <div class="form-group col-md-7">
	                           <label class="col-md-4 control-label">After hours:</label>
	                           <div class="col-md-8">
	                               <input class="form-control" placeholder="After hours" type="text">
	                           </div>
	                         </div>
	                       </div>
	                     </div>
	                     <div class="row clearfix">
	                       <div class="col-md-12">
	                         <div class="form-group col-md-5">
	                           <label class="col-md-4 control-label">Mobile:</label>
	                           <div class="col-md-8">
	                             <input class="form-control" placeholder="Mobile " value="0429463379" type="text">
	                             <span class="help-block m-b-0 m-t-0">
	                               <small class="text-red"> Telstra</small>
	                             </span>
	                           </div>
	                         </div>
	                         <div class="form-group col-md-7">
	                           <label class="col-md-4 control-label">Phone (secondary):</label>
	                           <div class="col-md-8">
	                               <input class="form-control" placeholder="Phone (secondary)" type="text">
	                           </div>
	                         </div>
	                       </div>
	                     </div>
	                     <div class="row clearfix">
	                       <div class="col-md-12">
	                         <div class="form-group col-md-5">
	                           <label class="col-md-4 control-label">Mobile (secondary):</label>
	                           <div class="col-md-8">
	                               <input class="form-control" placeholder="Mobile (secondary) " type="text">
	                           </div>
	                         </div>
	                         <div class="form-group col-md-7">
	                           <label class="col-md-4 control-label">Facsimile:</label>
	                           <div class="col-md-8">
	                               <input class="form-control" placeholder="Facsimile" type="text">
	                           </div>
	                         </div>
	                       </div>
	                     </div>
	                   </div>
	                 </div>
	                 <div class="panel-body clearfix">
	                   <div class="form-col-1 form-col">
	                     <div class="row clearfix">
	                       <div class="col-md-7 row">
	                         <div class="form-group">
	                           <label class="col-md-5 control-label">Primary Email:</label>
	                           <div class="col-md-7">
	                               <input class="form-control" placeholder="Primary Email " type="text">
	                           </div>
	                         </div>
	                         <div class="form-group">
	                           <label class="col-md-5 control-label">Secondary Email:</label>
	                           <div class="col-md-7">
	                               <input class="form-control" placeholder="Secondary Email " type="text">
	                           </div>
	                         </div>
	                         <div class="form-group">
	                           <label class="col-md-5 control-label">Tertiary Email:</label>
	                           <div class="col-md-7">
	                               <input class="form-control" placeholder="Tertiary Email " type="text">
	                           </div>
	                         </div>
	                       </div>
	                       <div class="col-md-5">
	                         <div class="text-note">
	                           <p> <strong>Please note:</strong> Fill in the secondary and tertiary email addresses if you wish to send emails to multiple addresses. </p> 
	                         </div>
	                       </div>
	                     </div>                                    
	                   </div>
	                 </div>
	                 <div class="panel-body clearfix">
	                   <div class="form-col-3 form-col">
	                     <div class="row clearfix">
	                       <div class="col-md-12">
	                         <div class="form-group col-md-3">
	                           <label class="col-md-4 control-label">Salutation:</label>
	                           <div class="col-md-8">
	                             <select class="form-control">
	                               <option value="">Please Select... </option>
	                               <option value="21">Mr</option>
	                               <option value="22">Ms</option>
	                               <option value="23">Miss</option>
	                               <option value="24">Mrs</option>
	                               <option value="25">Dr</option>
	                               <option value="73">Messrs</option>
	                               <option value="74">Mr &amp; Mrs</option>
	                             </select>
	                           </div>
	                         </div>
	                         <div class="form-group col-md-3">
	                           <label class="col-md-4 control-label">First Name:</label>
	                           <div class="col-md-8">
	                             <input class="form-control" placeholder="First Name" type="text">
	                           </div>
	                         </div>
	                         <div class="form-group col-md-6">
	                           <label class="col-md-4 control-label">Surname:</label>
	                           <div class="col-md-8">
	                               <input class="form-control" placeholder="Surname" type="text">
	                           </div>
	                         </div>
	                       </div>
	                     </div>
	                   </div>
	                 </div>
	                 <div class="panel-body clearfix">
	                   <div class="form-col-4 form-col">
	                     <div class="row clearfix">
	                       <div class="form-group col-md-12">
	                         <label class="col-md-2 control-label">Principal's Name: </label>
	                         <div class="col-md-10">
	                           <input class="form-control" placeholder="Principal's Name" type="text">
	                         </div>
	                       </div>
	                     </div>
	                   </div>
	                 </div>
	                 <div class="panel-body clearfix">
	                   <div class="form-col-5 form-col">
	                     <div class="row clearfix bgf3">
	                       <div class="form-group col-md-12">
	                         <label class="col-md-2 control-label">Business Name: </label>
	                         <div class="col-md-10">
	                           <input class="form-control" placeholder="Business Name" type="text">
	                         </div>
	                       </div>
	                     </div>
	                     <div class="row clearfix bgf9">
	                       <div class="form-group col-md-12">
	                         <label class="col-md-2 control-label">ABN: </label>
	                         <div class="col-md-10">
	                           <input class="form-control" placeholder="ABN" type="text">
	                         </div>
	                       </div>
	                     </div>
	                     <div class="row clearfix">
	                       <div class="form-group col-md-12">
	                         <label class="col-md-2 control-label">Business Address: </label>
	                         <div class="col-md-10">
	                           <input class="form-control" placeholder="Business Address" type="text">
	                         </div>
	                       </div>
	                     </div>
	                     <div class="row clearfix form-col-3 bgf3">
	                       <div class="col-md-12">
	                         <div class="form-group col-md-3">
	                           <label class="col-md-4 control-label">Suburb:</label>
	                           <div class="col-md-8">
	                             <input class="form-control" placeholder="Suburb" type="text">
	                           </div>
	                         </div>
	                         <div class="form-group col-md-3">
	                           <label class="col-md-4 control-label">Postcode:</label>
	                           <div class="col-md-8">
	                             <input class="form-control" placeholder="Postcode" type="text">
	                           </div>
	                         </div>
	                         <div class="form-group col-md-6">
	                           <label class="col-md-4 control-label">State:</label>
	                           <div class="col-md-8">
	                             <select class="form-control">
	                               <option value="">Please Select... </option>
	                               <option value="4" selected="selected">Queensland</option>
	                               <option value="2">New South Wales</option>
	                               <option value="7">Victoria</option>
	                               <option value="6">Tasmania</option>
	                               <option value="1">Aust. Capital Territory</option>
	                               <option value="5">South Australia</option>
	                               <option value="8">Western Australia</option>
	                               <option value="3">Northern Territory</option>
	                               <option value="9">Australia wide</option>
	                             </select>
	                           </div>
	                         </div>
	                       </div>
	                     </div>
	                   </div>
	                   <div class="col-md-12 clearfix">
	                     <div class="pull-right"><a href="#" class="text-blue strong">View On Map >> </a></div>
	                   </div>
	                 </div>
	                 <div class="panel-body clearfix">
	                   <div class="form-col-5 form-col">
	                     <table class="table table-striped table-condensed table-bordered" cellspacing="0">
	                        <tbody>
	                           <tr>
	                              <td width="58%">&nbsp;</td>
	                              <td width="42%">&nbsp;</td>
	                           </tr>
	                           <tr>
	                              <td>1. What is your current Turnover?</td>
	                              <td>
	                                 <div class="row">
	                                   <div class="col-md-6">
	                                     <input name="nu_business_sales" class="form-control" type="text">
	                                   </div>
	                                   <div class="col-md-6">
	                                     <select name="id_business_salesper" id="id_business_salesper" class="form-control">
	                                        <option value="">Please Select... </option>
	                                        <option value="1">per Annum</option>
	                                        <option value="2">per Quarter</option>
	                                        <option value="3">per Month</option>
	                                        <option value="4">per Week</option>
	                                        <option value="189">per Hour</option>
	                                        <option value="191">per Fortnight</option>
	                                     </select>
	                                   </div>
	                                 </div>
	                              </td>
	                           </tr>
	                           <tr class="bgf3">
	                              <td class="bgf3">2. And your Net Profit?</td>
	                              <td>
	                                 <div class="row">
	                                   <div class="col-md-6">
	                                     <input name="nu_net_profit" class="form-control" value="0.00" type="text">
	                                   </div>
	                                   <div class="col-md-6">
	                                     <select name="id_business_profitper" id="id_business_profitper" class="form-control">
	                                        <option value="">Please Select... </option>
	                                        <option value="1">per Annum</option>
	                                        <option value="2">per Quarter</option>
	                                        <option value="3">per Month</option>
	                                        <option value="4">per Week</option>
	                                        <option value="189">per Hour</option>
	                                        <option value="191">per Fortnight</option>
	                                     </select>
	                                   </div>
	                                 </div>
	                              </td>
	                           </tr>
	                           <tr>
	                              <td>3. Value of Plant &amp; Equipment? </td>
	                              <td nowrap="nowrap">
	                                 <input name="nu_fixtures_fittings_equip" class="form-control" type="text">
	                              </td>
	                           </tr>
	                           <tr class="bgf3">
	                              <td class="bgf3">4. Estimated value of stock? </td>
	                              <td nowrap="nowrap">
	                                 <input name="nu_business_stockvalue" class="form-control" type="text">
	                              </td>
	                           </tr>
	                           <tr>
	                              <td>5. What is your current asking price for the business?</td>
	                              <td>
	                               <input name="nu_business_askingprice" class="form-control" value="0.00" type="text">
	                              </td>
	                           </tr>
	                           <tr class="bgf3">
	                              <td>6. Is the business Freehold or Leasehold?</td>
	                              <td>
	                                <select name="id_premises_type" id="id_premises_type" class="form-control">
	                                   <option value="">Please Select... </option>
	                                   <option value="40">Freehold</option>
	                                   <option value="41">Leasehold</option>
	                                   <option value="42">Homebased</option>
	                                   <option value="43">Mobile</option>
	                                   <option value="112">Freehold w/ Leasehold Option</option>
	                                </select>
	                              </td>
	                           </tr>
	                           <tr>
	                              <td><span>6a. What is the rent you're paying?</span></td>
	                              <td>
	                                 <div class="row">
	                                   <div class="col-md-6">
	                                     <input name="nu_rent_amount" class="form-control" type="text"> 
	                                   </div>
	                                   <div class="col-md-6">
	                                      <select name="id_rentper" id="id_rentper" class="form-control">
	                                         <option value="">Please Select... </option>
	                                         <option value="1">per Annum</option>
	                                         <option value="2">per Quarter</option>
	                                         <option value="3">per Month</option>
	                                         <option value="4">per Week</option>
	                                         <option value="189">per Hour</option>
	                                         <option value="191">per Fortnight</option>
	                                      </select>
	                                   </div>
	                                 </div>
	                              </td>
	                           </tr>
	                           <tr class="bgf3">
	                              <td>6b. And what are the lease terms?</td>
	                              <td nowrap="nowrap">
	                                 <div class="row">
	                                   <div class="col-md-6">
	                                     <input name="tx_lease_terms" type="text" class="form-control">
	                                   </div>
	                                   <div class="col-md-6">
	                                      <select name="id_lease_termsper" id="id_lease_termsper" class="form-control">
	                                         <option value="">Please Select... </option>
	                                         <option value="1">per Annum</option>
	                                         <option value="2">per Quarter</option>
	                                         <option value="3">per Month</option>
	                                         <option value="4">per Week</option>
	                                         <option value="189">per Hour</option>
	                                         <option value="191">per Fortnight</option>
	                                      </select>
	                                   </div>
	                                 </div>
	                              </td>
	                           </tr>
	                           <tr>
	                              <td>7. (if a freehold) What is the value of the freehold?</td>
	                              <td nowrap="nowrap">
	                               <input name="nu_freehold_value" class="form-control" type="text">
	                              </td>
	                           </tr>
	                           <tr class="bgf3">
	                              <td class="bgf3">8. Value of Plant &amp; Equipment? </td>
	                              <td nowrap="nowrap">
	                                 <input name="nu_fixtures_fittings_equip" class="form-control" type="text">
	                              </td>
	                           </tr>
	                           <tr>
	                             <td>9. What is your current asking price for the business?</td>
	                             <td><input name="nu_business_askingprice" class="form-control" value="0.00" type="text"></td>
	                           </tr>
	                           <tr class="bgf3">
	                             <td>10. Have you had it on the market for long?</td>
	                             <td nowrap="nowrap">
	                               <input name="tx_business_timeonmarket" class="form-control" type="text">
	                             </td>
	                           </tr>
	                           <tr>
	                              <td>11. How long have you owned the business?</td>
	                              <td>
	                               <input name="da_business_establishedcurrentowner" class="form-control" type="text"></td>
	                           </tr>
	                           <tr class="bgf3">
	                              <td>
	                                 12. How long has the business been established for?
	                              </td>
	                              <td><input name="da_business_established" class="form-control" type="text"></td>
	                           </tr>
	                           <tr>
	                              <td>13. Is that in a shopping centre/ Industrial Area/ Neighbourhood complex/ Main Street/ Office Complex</td>
	                              <td>
	                                <select name="id_location" id="id_location" class="form-control">
	                                   <option value="">Please Select... </option>
	                                   <option value="75">Shopping Centre</option>
	                                   <option value="76">Industrial Area</option>
	                                   <option value="77">Neighbourhood Complex</option>
	                                   <option value="78">Main Street</option>
	                                   <option value="79">Office Complex</option>
	                                   <option value="134">NA</option>
	                                </select>
	                              </td>
	                           </tr>
	                           <tr class="bgf3">
	                              <td>14. Passing Foot Traffic</td>
	                              <td>
	                                 <input name="tx_foot_traffic" value="light" type="radio">
	                                 Light
	                                 <input name="tx_foot_traffic" value="heavy" type="radio">
	                                 Heavy 
	                              </td>
	                           </tr>
	                           <tr>
	                              <td>15. Passing Vehicle Traffic</td>
	                              <td>
	                                 <input name="tx_vehicle_traffic" value="light" type="radio">
	                                 Light
	                                 <input name="tx_vehicle_traffic" value="heavy" type="radio">
	                                 Heavy 
	                              </td>
	                           </tr>
	                           <tr class="bgf3">
	                              <td>16. What is the business type</td>
	                              <td>
	                                <select name="id_business_type" id="id_business_type" class="form-control">
	                                   <option value="">Please Select... </option>
	                                   <option value="5">Business</option>
	                                   <option value="6">Franchise/Licence</option>
	                                   <option value="212">Business Opportunities</option>
	                                   <option value="220">Business Migration</option>
	                                   <option value="236">Business Migration Opportunities</option>
	                                   <option value="237">Internet Business Opportunities</option>
	                                   <option value="238">Businesses For Sale</option>
	                                   <option value="239">Franchise Opportunities</option>
	                                   <option value="240">Licence Opportunities</option>
	                                </select>
	                              </td>
	                           </tr>
	                           <tr>
	                              <td colspan="3" height="33"></td>
	                           </tr>
	                           <tr>
	                              <td colspan="3"><strong>Other General (Rapport) Questions : </strong></td>
	                           </tr>
	                           <tr>
	                              <td>1. Have you listed or dealt with any other brokers before?</td>
	                              <td nowrap="nowrap">
	                                 <div class="row">
	                                   <div class="col-md-2"> 
	                                     <span class="control-label">
	                                       <input name="obro" value="1" checked="checked" type="radio">
	                                       No
	                                       <input name="obro" value="2" type="radio">
	                                       Yes.
	                                     </span>
	                                   </div>
	                                   <div class="col-md-10">
	                                     <label class="col-md-6 control-label">If yes, name of Company: </label>
	                                     <div class="col-md-6">
	                                       <input class="form-control" name="tx_business_otherbrokers" placeholder="Name of Company" type="text">
	                                     </div>
	                                   </div>
	                                 </div>
	                              </td>
	                           </tr>
	                           <tr class="bgf3">
	                              <td>2. What is your reason for selling the business?</td>
	                              <td><input name="tx_business_reasonforsale" class="form-control" type="text"></td>
	                           </tr>
	                           <tr>
	                              <td>3. Are you the sole owner of the business? </td>
	                              <td>
	                                 <div class="row">
	                                   <div class="col-md-3">
	                                     <span class="control-label">
	                                       <input name="partner" value="1" checked="checked" type="radio">
	                                       Yes 
	                                       <input name="partner" value="2" type="radio"> 
	                                       No. 
	                                     </span>
	                                   </div>
	                                   <div class="col-md-9">
	                                     <label class="col-md-5 control-label">Name of partner:</label>
	                                     <div class="col-md-7">
	                                       <input class="form-control" name="tx_business_partnership" placeholder="Name of partner" type="text">
	                                     </div>
	                                   </div>
	                                 </div>
	                              </td>
	                           </tr>
	                           <tr>
	                              <td colspan="3" height="33"><span> </span></td>
	                           </tr>
	                           <tr>
	                              <td colspan="3"><strong>Best Attributes &amp; Future Potential: </strong></td>
	                           </tr>
	                           <tr>
	                              <td colspan="3">
	                                 <table class="table table-striped table-condensed table-bordered" cellspacing="0">
	                                    <tbody>
	                                       <tr class="bgf3">
	                                          <td style="width: 200px;"><span>Best Attributes:</span></td>
	                                          <td>
	                                             <div><textarea name="tx_best_attributes2" class="form-control"></textarea></div>
	                                          </td>
	                                       </tr>
	                                       <tr class="bgf3">
	                                          <td><span>Future Potential:</span></td>
	                                          <td>
	                                             <div><textarea name="tx_future_potential2" class="form-control"></textarea></div>
	                                          </td>
	                                       </tr>
	                                    </tbody>
	                                 </table>
	                              </td>
	                           </tr>
	                        </tbody>
	                     </table>
	                   </div>
	                 </div>
	               </form>
	             </div>
	           </div>
	         </div>
	       </div>
	       <div class="tab-pane" id="assessment">
	         <div class="row">
	           <div class="col-md-12">
	             <div class="panel panel-default panel-lead">
	               <div class="panel-heading clearfix">
	                   <h3 class="panel-title pull-left">BUSINESS ASSESSMENT</h3>
	               </div>
	               <form class="form-horizontal" role="form">
	                 <div class="panel-body clearfix">
	                   <div class="row clearfix">
	                     <div class="form-col form-col-6">
	                       <div class="form-group bgf3">
	                         <label class="col-md-3 control-label">POSITIVE POINTS </label>
	                         <div class="col-md-9">
	                           <textarea name="positive" class="form-control"></textarea>
	                         </div>
	                       </div>
	                       <div class="form-group bgf9">
	                         <label class="col-md-3 control-label">NEGATIVE POINTS </label>
	                         <div class="col-md-9">
	                           <textarea name="negative" class="form-control"></textarea>
	                         </div>
	                       </div>
	                       <div class="form-group bgf3">
	                         <label class="col-md-3 control-label">SOLUTIONS </label>
	                         <div class="col-md-9">
	                           <textarea name="solution" class="form-control"></textarea>
	                         </div>
	                       </div>
	                       <div class="form-group bgf9">
	                         <label class="col-md-3 control-label">ASSESSMENT VALUE </label>
	                         <div class="col-md-9">
	                           <i class="fa fa-usd control-label pull-left" aria-hidden="true"></i>
	                           <div class="col-md-9">
	                             <input type="text" name="assessment_value" class="form-control" placeholder="Assessment Value" />
	                           </div>
	                           <div class="col-md-2 control-label">
	                             <label class="control-label">
	                               <input name="incl_stock" class="" type="checkbox"> Including Stock 
	                             </label>
	                           </div>
	                         </div>
	                       </div>
	                       <div class="form-group bgf3">
	                         <label class="col-md-3 control-label">Principal's Rating </label>
	                         <div class="col-md-9">
	                           <div class="col-md-5">
	                             <select name="rating" id="rating" class="form-control"> 
	                               <option value="">-</option>
	                               <option value="107">1</option>
	                               <option value="108">2</option>
	                               <option value="109">3</option>
	                               <option value="110">4</option>
	                               <option value="111">5</option>
	                             </select>
	                           </div>
	                           <span class="pull-left control-label"> / 5 </span>
	                         </div>
	                       </div>
	                     </div>
	                   </div>
	                 </div>
	                 <div class="panel-footer clearfix">
	                   <button type="button" class="btn btn-primary btn-custom pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
	                 </div>
	               </form>
	             </div>
	           </div>
	         </div>
	       </div>
	       <div class="tab-pane" id="proposal">
	         proposal
	       </div>
	       <div class="tab-pane" id="registration">
	         registration
	       </div>
	     </div>
	   </div>
	</div>
@endsection

@section('footer')
	@include('partials.footer-project-completion')
@endsection

@section('footer-script')
	@include('partials.footer-script')
@endsection