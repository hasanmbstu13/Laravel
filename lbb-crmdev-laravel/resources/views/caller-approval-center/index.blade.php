@extends('layouts.main')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box clearfix">
				<h4 class="col-md-4">APPROVAL CENTRAL</h4>
				<div class="pull-right col-md-8">
				</div>
			</div>
		</div>
	</div>



	<!-- end row -->
	<div class="m-t-30">
		<ul class="nav nav-tabs tabs-colored">
			<li class="active"> 
				<a href="#letters" data-toggle="tab" aria-expanded="false"> 
					<span class="visible-xs"><i class="fa fa-home"></i></span> 
					<span class="hidden-xs">Letters </span> 
				</a> 
			</li>
			<li class=""> 
				<a href="#marketing" data-toggle="tab" aria-expanded="true"> 
					<span class="visible-xs"><i class="fa fa-user"></i></span> 
					<span class="hidden-xs">Marketing </span> 
				</a> 
			</li>
			<li class=""> 
				<a href="#registration" data-toggle="tab" aria-expanded="true"  class="bg-info"> 
					<span class="visible-xs"><i class="fa fa-user"></i></span> 
					<span class="hidden-xs">Registration </span> 
				</a> 
			</li>
		</ul>

		<div class="tab-content m-b-50">
			<div class="tab-pane active" id="letters">
				<div class="panel panel-default panel-lead">
					<div class="panel-body clearfix">
						<div class="panel-heading pull-left">
							<h4 class="panel-title pull-left">Sellers</h4>
						</div>
						<div class="pull-right">
							<button type="button" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
				<table class="table table table-hover m-b-50 caller_table table-striped">
					<thead>
						<tr>
							<th>SID</th>
							<th>Date</th>
							<th>CONSULTANT </th>
							<th>BUSINESS NAME</th>
							<th>LETTER TYPES</th>
							<th>VIEW </th>
							<th>APPROVE</th>
							<th>REJECT </th>
							<th>COMMENT </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">2</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
					</tbody>
				</table>
				<div class="panel panel-default panel-lead">
					<div class="panel-body clearfix">
						<div class="panel-heading pull-left">
							<h4 class="panel-title pull-left">Buyers </h4>
						</div>
						<div class="pull-right">
							<button type="button" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
				<table class="table table table-hoverm-b-50 caller_table table-striped">
					<thead>
						<tr>
							<th>BID</th>
							<th>Date</th>
							<th>CONSULTANT </th>
							<th>BUYER’S NAME</th>
							<th>LETTER TYPES</th>
							<th>VIEW </th>
							<th>APPROVE</th>
							<th>REJECT </th>
							<th>COMMENT </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">2</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
					</tbody>
				</table>
				<div class="panel panel-default panel-lead">
					<div class="panel-body clearfix">
						<div class="panel-heading pull-left">
							<h4 class="panel-title pull-left">Advisors  </h4>
						</div>
						<div class="pull-right">
							<button type="button" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
				<table class="table table table-hover m-b-50 caller_table table-striped">
					<thead>
						<tr>
							<th>AID</th>
							<th>Date</th>
							<th>CONSULTANT </th>
							<th>SUBJECT</th>
							<th>RECEIPIENT</th>
							<th>VIEW </th>
							<th>APPROVE</th>
							<th>REJECT </th>
							<th>COMMENT </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">2</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Testing</td>
							<th>Test RECEIPIENT</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
					</tbody>
				</table>

				<div class="panel panel-default panel-lead">
					<div class="panel-body clearfix">
						<div class="panel-heading pull-left">
							<h4 class="panel-title pull-left">Staff</h4>
						</div>
						<div class="pull-right">
							<button type="button" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
				<table class="table table table-hover m-0 caller_table table-striped">
					<thead>
						<tr>
							<th>SID</th>
							<th>Date</th>
							<th>CONSULTANT </th>
							<th>BUYER’S  NAME</th>
							<th>SELLERS  NAME</th>
							<th>LETTER TYPES</th>
							<th>VIEW </th>
							<th>APPROVE</th>
							<th>REJECT </th>
							<th>COMMENT </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">2</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="tab-pane" id="marketing">
				<div class="panel panel-default panel-lead">
					<div class="panel-body clearfix">
						<div class="panel-heading pull-left">
							<h4 class="panel-title pull-left">Photos</h4>
						</div>
						<div class="pull-right">
							<button type="button" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
				<table class="table table table-hover m-b-50 caller_table table-striped">
					<thead>
						<tr>
							<th>Date</th>
							<th>CONSULTANT </th>
							<th>BUSINESS ID</th>
							<th>BUSINESS NAME</th>
							<th>VIEW </th>
							<th>APPROVE</th>
							<th>REJECT </th>
							<th>COMMENT </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>1</td>
							<th>Test</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>2</td>
							<th>Test2</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>4</td>
							<th>Test4</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>5</td>
							<th>Test6</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
					</tbody>
				</table>

				<div class="panel panel-default panel-lead">
					<div class="panel-body clearfix">
						<div class="panel-heading pull-left">
							<h4 class="panel-title pull-left">AD</h4>
						</div>
						<div class="pull-right">
							<button type="button" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
				<table class="table table table-hover m-b-50 caller_table table-striped">
					<thead>
						<tr>
							<th>Date</th>
							<th>CONSULTANT </th>
							<th>BUSINESS ID</th>
							<th>BUSINESS NAME</th>
							<th>VIEW </th>
							<th>APPROVE</th>
							<th>REJECT </th>
							<th>COMMENT </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>1</td>
							<th>Test</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>2</td>
							<th>Test2</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>4</td>
							<th>Test4</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>5</td>
							<th>Test6</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
					</tbody>
				</table>

			</div>

			<div class="tab-pane" id="registration">
				<div class="panel panel-default panel-lead">
					<div class="panel-body clearfix">
						<div class="panel-heading pull-left">
							<h4 class="panel-title pull-left">Buyers </h4>
						</div>
						<div class="pull-right">
							<button type="button" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
				<table class="table table table-hover m-b-50 caller_table table-striped">
					<thead>
						<tr>
							<th>BID</th>
							<th>Date</th>
							<th>CONSULTANT </th>
							<th>BUYER’S  NAME</th>
							<th>VIEW </th>
							<th>APPROVE</th>
							<th>REJECT </th>
							<th>COMMENT </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">2</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
					</tbody>
				</table>

				<div class="panel panel-default panel-lead">
					<div class="panel-body clearfix">
						<div class="panel-heading pull-left">
							<h4 class="panel-title pull-left">Sellers </h4>
						</div>
						<div class="pull-right">
							<button type="button" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
				<table class="table table table-hover m-b-50 table-striped caller_table">
					<thead>
						<tr>
							<th>SID</th>
							<th>Date</th>
							<th>CONSULTANT </th>
							<th>BUSINESS NAME</th>
							<th>LETTER TYPES</th>
							<th>VIEW </th>
							<th>APPROVE</th>
							<th>REJECT </th>
							<th>COMMENT </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">2</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>21/06/2017</td>
							<td>CONSULTANT11</td>
							<td>Name</td>
							<th>Test Type</th>
							<th><button type="button" class="btn btn-primary"> View</button></th>
							<th>Yes</th>
							<th>No</th>
							<th>Test Test Description</th>
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
	@include('partials.footer-script')
@endsection