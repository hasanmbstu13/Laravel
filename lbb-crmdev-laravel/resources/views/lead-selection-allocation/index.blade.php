@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="m-t-30">
        <ul class="nav nav-tabs tabs-colored">
          <li class=""> <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Lead Selection</span> </a> </li>
          <li class="active"> <a href="#records" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Leads Allocation</span> </a> </li>
        </ul>
        <div class="tab-content m-b-50">
          <div class="tab-pane my-form-custom lead-selection-form" id="profile">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box">
                  <div class="row">
                    <div class="col-sm-9">
                      <h4 class="header-title ">Lead Selection</h4>
                    </div>
                    <div class="col-sm-3 ">
                      <div class="submit_custom">
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-search" aria-hidden="true"></i> Search </button>
                      </div>
                    </div>
                    <!-- <div class="col-sm-3 ">
                      <form class="navbar-form" id="lead_selection_form">
                        <div class="form-group">
                          <div class="input-group">
                              <input id="lead_selection_search" name="lead_selection_search" class="form-control" placeholder="Search Site" type="text">
                              <span class="input-group-btn">
                                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                              </span> 
                          </div>
                        </div>
                      </form>
                    </div> -->
                  </div>
                </div>
              </div>
              <form class="form-horizontal form-validation" role="form">
                <div class="col-sm-4">
                  <div class="form-group col-sm-12">
                    <label class="col-sm-4 control-label">Country</label>
                    <div class="col-sm-8 p-l-8 border-left">
                      {{ Form::select('country', $all_countries, $selected_country, ['class' => 'form-control select2']) }}
                      <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
                  </div>
                  <div class="form-group col-sm-12">
                    <label class="col-sm-4 control-label">State</label>
                    <div class="col-sm-8 p-l-8 border-left">
                      <div id="state">
                        <select class="form-control" required>
                          <option>GJ</option>
                          <option>MP</option>
                          <option>UP</option>
                          <option>JM</option>
                          <option>MA</option>
                        </select>
                      </div>
                     
                      <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
                  </div>
                  <div class="form-group col-sm-12">
                    <label class="col-sm-4 control-label">City</label>
                    <div class="col-sm-8 p-l-8 border-left">
                      <div id = "city">
                        <select class="form-control">
                          <option>Bhavnagar</option>
                          <option>Surat</option>
                          <option>Ahmedabad</option>
                          <option>Vadodra</option>
                          <option>Rajkot</option>
                        </select>
                      </div>
                      <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> </div>
                  </div>
                  <div class="form-group col-sm-12">
                    <label class="col-sm-4 control-label">Suburb</label>
                    <div class="col-sm-8 p-l-8 border-left">
                      <div id = "suburb">
                          <select class="form-control">
                            <option>Abbotsbury</option>
                            <option> Abbotsford</option>
                            <option>Acacia Gardens</option>
                            <option>Agnes Banks</option>
                            <option>Airds</option>
                          </select>
                      </div>
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
              </form>
              <div class="col-sm-12">
                  <div class="card-box clearfix">
                    <div class="col-sm-3 pull-right">
                      <div class="submit_custom">
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-search" aria-hidden="true"></i> Search </button>
                      </div>
                    </div>
                    <!-- <div class="col-sm-3 pull-right">
                      <form class="navbar-form" id="lead_selection_form_bottom">
                        <div class="form-group">
                          <div class="input-group">
                              <input id="lead_selection_search" name="lead_selection_search" class="form-control" placeholder="Search Site" type="text">
                              <span class="input-group-btn">
                                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                              </span> 
                          </div>
                        </div>
                      </form>
                    </div> -->
                  </div>
                </div>
            </div>
          </div>
          <div class="tab-pane active" id="records">
            <div class="row ">
              <div class="col-sm-12">
                <div class="m-b-20 table-responsive">
                  @includeif('partials.lead-allocation-table', ['data' => 'all_records'])
                </div>
              </div>
              <div class="p-t-50 my-form-custom lead-selection-form">
                <form class="form-horizontal form-validation" role="form">
                  <div class="col-md-12 last-col">
                    <div class="form-group col-sm-6">
                      <label class="col-sm-4 control-label">Broker</label>
                      <div class="col-sm-8 p-l-8 border-left">
                        <select class="form-control select2">
                          <option>Broker1</option>
                          <option>Broker2</option>
                          <option>Broker3</option>
                          <option>Broker4</option>
                          <option>Broker5</option>
                        </select>
                        <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> 
                      </div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label class="col-sm-4 control-label">Consultant</label>
                      <div class="col-sm-8 p-l-8 border-left">
                        <select class="form-control">
                          <option>Consultant1 </option>
                          <option>Consultant2 </option>
                          <option>Consultant3 </option>
                          <option>Consultant4 </option>
                          <option>Consultant5 </option>
                        </select>
                        <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span> 
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end card box -->
      <!-- end row -->
      <!-- end row -->
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->
</div>
@endsection

@section('script')
	@include('partials.footer-script')
@endsection



