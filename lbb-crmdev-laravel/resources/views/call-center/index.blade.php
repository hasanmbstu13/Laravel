@extends('layouts.main')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box clearfix">
				<h4 class="col-md-4">Call Centre- Including Pipe Lines Only</h4>
				<div class="pull-right col-md-8">
				</div>
			</div>
		</div>
	</div>



	<!-- end row -->
	<div class="m-t-30">
		<ul class="nav nav-tabs tabs-colored">
			<li class="active"> 
				<a href="#sellers" data-toggle="tab" aria-expanded="false"> 
					<span class="visible-xs"><i class="fa fa-home"></i></span> 
					<span class="hidden-xs">Sellers Pipeline</span> 
				</a> 
			</li>
			<li class=""> 
				<a href="#buyers" data-toggle="tab" aria-expanded="true"> 
					<span class="visible-xs"><i class="fa fa-user"></i></span> 
					<span class="hidden-xs">Buyers Pipeline</span> 
				</a> 
			</li>
			<li class=""> 
				<a href="#match" data-toggle="tab" aria-expanded="true" class="bg-info"> 
					<span class="visible-xs"><i class="fa fa-user"></i></span> 
					<span class="hidden-xs">Match Pipeline</span> 
				</a> 
			</li>
			<li class=""> 
				<a href="#appointment" data-toggle="tab" aria-expanded="true" class="bg-success"> 
					<span class="visible-xs"><i class="fa fa-user"></i></span> 
					<span class="hidden-xs">Appointment Diary</span> 
				</a> 
			</li>
		</ul>

		<div class="tab-content m-b-50">
			<div class="tab-pane active" id="sellers">
				<table class="table table table-hover m-0 caller_table">
					<thead>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th>Time</th>
							<th>Category</th>
							<th>State</th>
							<th>City</th>
							<th>Suburb</th>
							<th>Price</th>
							<th>Rating</th>
							<th>Status</th>
							<th>View </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>sellers</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>Suburb</th>
							<th>Price</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>sellers</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>76767</th>
							<th>98</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>989</th>
							<th>78</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category2</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>656556</th>
							<th>12</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Surat</th>
							<th>6878</th>
							<th>23</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="tab-pane" id="buyers">
				<table class="table table table-hover m-0 caller_table">
					<thead>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th>Time</th>
							<th>Category</th>
							<th>State</th>
							<th>City</th>
							<th>Suburb</th>
							<th>Price</th>
							<th>Rating</th>
							<th>Status</th>
							<th>View </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>buyers</th>
							<th>Suburb</th>
							<th>Price</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>buyers</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>76767</th>
							<th>98</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>989</th>
							<th>78</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category2</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>656556</th>
							<th>12</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Surat</th>
							<th>6878</th>
							<th>23</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="match">
				<table class="table table table-hover m-0 caller_table">
					<thead>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th>Time</th>
							<th>Category</th>
							<th>State</th>
							<th>City</th>
							<th>Suburb</th>
							<th>Price</th>
							<th>Rating</th>
							<th>Status</th>
							<th>View </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>match1</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>Suburb</th>
							<th>Price</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>76767</th>
							<th>98</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>989</th>
							<th>78</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category2</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>656556</th>
							<th>12</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Surat</th>
							<th>6878</th>
							<th>23</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="appointment">
				<table class="table table table-hover m-0 caller_table">
					<thead>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th>Time</th>
							<th>Category</th>
							<th>State</th>
							<th>City</th>
							<th>Suburb</th>
							<th>Price</th>
							<th>Rating</th>
							<th>Status</th>
							<th>View </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>Suburb</th>
							<th>Price</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>76767</th>
							<th>98</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>989</th>
							<th>78</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category2</td>
							<th>Gujrat</th>
							<th>Bhavnagar</th>
							<th>656556</th>
							<th>12</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>21/06/2017</td>
							<td>9:43 AM</td>
							<td>Category1</td>
							<th>Gujrat</th>
							<th>Surat</th>
							<th>6878</th>
							<th>23</th>
							<th>5</th>
							<th>new</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')
	@parent
@endsection

@section('footer-script')
	@include('partials.footer-script');
@endsection