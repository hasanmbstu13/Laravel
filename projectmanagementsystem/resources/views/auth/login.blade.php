@extends('layouts.auth')

@section('content')

    <form class="form-horizontal form-material" id="loginform" action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}

        @if(is_null($setting->logo))
                <!--This is dark logo icon-->
            <a href="javascript:void(0)" class="text-center db"><img src="{{ asset('logo-dark.png') }}" alt="Home" /></a>
        @else
            <a href="javascript:void(0)" class="text-center db "><img src="{{ asset('storage/company-logo.png') }}" alt="home" class="img-responsive pull-left" width="50" /> <span class="text-dark pull-left auth-logo"><?php
                $company = explode(' ',trim($setting->company_name));
                echo strtoupper($company[0]);
                ?></span></a>
            <div class="clearfix"></div>

        @endif


        @if (session('message'))
            <div class="alert alert-danger m-t-10">
                {{ session('message') }}
            </div>
        @endif

        <div class="form-group m-t-40 {{ $errors->has('email') ? 'has-error' : '' }}">
            <div class="col-xs-12">
                <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" autofocus required="" placeholder="Email">
                @if ($errors->has('email'))
                    <div class="help-block with-errors">{{ $errors->first('email') }}</div>
                @endif

            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input class="form-control" id="password" type="password" name="password" required="" placeholder="Password">
                @if ($errors->has('password'))
                    <div class="help-block with-errors">{{ $errors->first('password') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="checkbox checkbox-primary pull-left p-t-0">
                    <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="checkbox-signup"> Remember me </label>
                </div>
                <a href="{{ route('password.request') }}"  class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot password?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
            </div>
        </div>

        {{--<div class="form-group m-b-0">--}}
            {{--<div class="col-sm-12 text-center">--}}
                {{--<p>Don't have an account? <a href="{{ route('register') }}" class="text-primary m-l-5"><b>Sign Up</b></a></p>--}}
            {{--</div>--}}
        {{--</div>--}}
    </form>
@endsection
