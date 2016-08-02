@extends('layout')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
 
			<h1>{{ $card->title }}</h1>

			<ul class="list-group">
				@foreach ($card->notes as $note)
					<li class="list-group-item">
						{{ $note->body }}
						<!-- <a href="#" style="float:right;">{{ $note->user_id }}</a> -->
						<a href="#" class="pull-right">{{ $note->user->username }}</a>
					</li>
				@endforeach
			</ul>
			<hr>

			<h3>Add a New Note</h3>

			<form method="POST" action="/cards/{{ $card->id }}/notes">
				<!-- when create a field make sure it has csrf_field -->
				 <!-- {{ csrf_field() }} -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<!-- <input type="hidden" name="user_id" value="id_of_the_authenticated_user"></input> -->
				
				<!-- <input type="hidden" name="user_id" value="1"></input> -->
				
				<div class="form-group">
					<!-- Here name body keep by matching with database column name -->
					<textarea name="body" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add Note</button>
				</div>
			</form>
			

		</div>
		{{ var_dump($errors) }}
		{{ count($errors) }}
		@if (count($errors))
			<ul>
				@foreach ($errors->all as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
	</div>
@stop

