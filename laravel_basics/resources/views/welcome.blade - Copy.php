@extends('layout')

@section('content')     
	@include('flash')
   <h1>The Welcome page goes here</h1>
@stop

@if (Session::has('flash_message'))
		<div class="Alert Alert--{{ ucwords(Session::get('flash_message_level'))}}">
   			{{ Session::get('flash_message') }}
		</div>
    @endif    