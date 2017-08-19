@extends('layouts.auth')

@section('content')


    <form class="form-horizontal"  method="POST" action="{{ route('password.email') }}">
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

        <h3 class="box-title m-t-40 m-b-0">Recover Password</h3>

        <div class="form-group ">
            <div class="col-xs-12">
                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
            </div>
        </div>
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-xs-12">
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required="" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Send Password Reset Link</button>
            </div>
        </div>

        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
                <p><a href="{{ route('login') }}" class="text-primary m-l-5"><b>Sign In</b></a></p>
            </div>
        </div>

    </form>
@endsection
