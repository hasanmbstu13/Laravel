@extends('layouts.app')

@section('page-title')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="{{ $pageIcon }}"></i> {{ $pageTitle }}</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}">@lang('app.menu.home')</a></li>
                <li class="active">{{ $pageTitle }}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
<link rel="stylesheet" href="{{ asset('plugins/bower_components/custom-select/custom-select.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">@lang('modules.accountSettings.updateTitle')</h3>

                <p class="text-muted m-b-30 font-13"></p>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        {!! Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'PUT']) !!}
                        <div class="form-group">
                            <label for="company_name">@lang('modules.accountSettings.companyName')</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $global->company_name }}">
                        </div>
                        <div class="form-group">
                            <label for="company_email">@lang('modules.accountSettings.companyEmail')</label>
                            <input type="email" class="form-control" id="company_email" name="company_email" value="{{ $global->company_email }}">
                        </div>
                        <div class="form-group">
                            <label for="company_phone">@lang('modules.accountSettings.companyPhone')</label>
                            <input type="tel" class="form-control" id="company_phone" name="company_phone" value="{{ $global->company_phone }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('modules.accountSettings.companyWebsite')</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ $global->website }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('modules.accountSettings.companyLogo')</label>
                            <div class="col-md-12">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        @if(is_null($global->logo))
                                            <img src="https://placeholdit.imgix.net/~text?txtsize=25&txt=@lang('modules.accountSettings.uploadLogo')&w=200&h=150" alt=""/>
                                        @else
                                            <img src="{{asset('storage/company-logo.png') }}" alt="" />
                                        @endif
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                         style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> @lang('app.selectImage') </span>
                                    <span class="fileinput-exists"> @lang('app.change') </span>
                                    <input type="file" name="logo"> </span>
                                        <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                           data-dismiss="fileinput"> @lang('app.remove') </a>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="address">@lang('modules.accountSettings.companyAddress')</label>
                            <textarea class="form-control" id="address" rows="5" name="address">{{ $global->address }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="address">@lang('modules.accountSettings.defaultCurrency')</label>
                            <select name="currency_id" id="currency_id" class="form-control">
                                @foreach($currencies as $currency)
                                   <option
                                           @if($currency->id == $global->currency_id) selected @endif
                                           value="{{ $currency->id }}">{{ $currency->currency_symbol.' ('.$currency->currency_code.')' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">@lang('modules.accountSettings.defaultTimezone')</label>
                            <select name="timezone" id="timezone" class="form-control select2">
                                @foreach($timezones as $tz)
                                    <option @if($global->timezone == $tz) selected @endif>{{ $tz }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">@lang('modules.accountSettings.changeLanguage')</label>
                            <select name="locale" id="locale" class="form-control select2">
                                <option @if($global->locale == "en") selected @endif value="en">English</option>
                                <option @if($global->locale == "es") selected @endif value="es">Spanish</option>
                                <option @if($global->locale == "fr") selected @endif value="fr">French</option>
                            </select>
                        </div>

                        <button type="submit" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                            @lang('app.update')
                        </button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light">@lang('app.reset')</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- .row -->

@endsection

@push('footer-script')
<script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>

    <script>
        $(".select2").select2();

        $('#save-form').click(function () {
            $.easyAjax({
                url: '{{route('admin.settings.update', ['1'])}}',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            })
        });
    </script>
@endpush

