@extends('layouts.main')
@section('title', 'blog two')
@section('body_class', 'blog')

@section('header')
	@parent
@endsection

@section('content')	
	<section id="blogApp">
		<blogs url="{{route('blogs.index')}}"></blogs>		
	</section>
@endsection

@section('script')
	@parent
@endsection

@section('footer-script')
	@parent
@endsection