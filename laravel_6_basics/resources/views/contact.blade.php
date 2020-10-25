@extends('layout')

@section('content')
    <div id="wrapper">
        <div class="contact d-flex justify-content-center py-4">
            <form method="post" action="/contact">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="h6">Email address</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted h6">We'll never share your email with anyone else.</small>
                    @error('email')
                        <div class="text-danger h6">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary px-4">Email me</button>

                @if (session('message'))
                    <div>
                        <p class="text-success mt-2 h6">
                            {{session('message')}}
                        </p>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
