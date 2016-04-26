@extends('layout')

@section('content')
	<h1>Edit the note</h1>

	<!-- <form method="PATCH" action="/notes/{{ $note->id }}"> -->
	<form method="POST" action="/notes/{{ $note->id }}">
		
		<!-- laravel check if the hidden field is patched or not then reload or rerouting the patch route -->
		<!-- PATCH is for update  -->
		<!-- if we want to DELETE then use DELETE -->
		{{ method_field('PATCH') }}

		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<!-- Here name body keep by matching with database column name -->
			<textarea name="body" class="form-control">{{ $note->body }}</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Update Note</button>
		</div>
	</form>

@stop