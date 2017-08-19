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
<link rel="stylesheet" href="{{ asset('plugins/bower_components/switchery/dist/switchery.min.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="white-box">
                <h3 class="box-title m-b-0">@lang("modules.emailSettings.notificationTitle")</h3>

                <p class="text-muted m-b-10 font-13">
                    @lang("modules.emailSettings.notificationSubtitle")
                </p>

                <div class="row">
                    <div class="col-sm-12 col-xs-12 b-t p-t-20">
                        {!! Form::open(['id'=>'editSettings','class'=>'ajax-form form-horizontal','method'=>'PUT']) !!}

                        @foreach($emailSettings as $setting)
                            <div class="form-group">
                                <label class="control-label col-sm-8">{{ ucfirst($setting->setting_name) }}</label>

                                <div class="col-sm-4">
                                    <div class="switchery-demo">
                                        <input type="checkbox" @if($setting->send_email == 'yes') checked
                                               @endif class="js-switch change-email-setting" data-color="#99d683"
                                               data-setting-id="{{ $setting->id }}"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="panel ">
                <div class="panel-heading"> @lang("modules.emailSettings.configTitle")</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        {!! Form::open(['id'=>'updateSettings','class'=>'ajax-form','method'=>'POST']) !!}
                        {!! Form::hidden('_token', csrf_token()) !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>@lang("modules.emailSettings.mailDriver")</label>
                                        <select class="form-control" name="mail_driver" id="mail_driver">
                                            <option @if($smtpSetting->mail_driver == 'smtp') selected @endif>smtp
                                            </option>
                                            <option @if($smtpSetting->mail_driver == 'mail') selected @endif>mail
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang("modules.emailSettings.mailHost")</label>
                                        <input type="text" name="mail_host" id="mail_host"
                                               class="form-control" value="{{ $smtpSetting->mail_host }}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang("modules.emailSettings.mailPort")</label>
                                        <input type="text" name="mail_port" id="mail_port" class="form-control"
                                               value="{{ $smtpSetting->mail_port }}">
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang("modules.emailSettings.mailUsername")</label>
                                        <input type="text" name="mail_username" id="mail_username"
                                               class="form-control" value="{{ $smtpSetting->mail_username }}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang("modules.emailSettings.mailPassword")</label>
                                        <input type="password" name="mail_password" id="mail_password"
                                               class="form-control" value="{{ $smtpSetting->mail_password }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang("modules.emailSettings.mailFrom")</label>
                                        <input type="text" name="mail_from_name" id="mail_from_name"
                                               class="form-control" value="{{ $smtpSetting->mail_from_name }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang("modules.emailSettings.mailEncryption")</label>
                                        <select class="form-control" name="mail_encryption" id="mail_encryption">
                                            <option @if($smtpSetting->mail_encryption == 'tls') selected @endif>tls
                                            </option>
                                            <option @if($smtpSetting->mail_encryption == 'ssl') selected @endif>ssl
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->


                        </div>
                        <div class="form-actions">
                            <button type="submit" id="save-form" class="btn btn-success"><i class="fa fa-check"></i>
                                @lang('app.update')
                            </button>
                            <button type="reset" class="btn btn-default">@lang('app.reset')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

@endsection

@push('footer-script')
<script src="{{ asset('plugins/bower_components/switchery/dist/switchery.min.js') }}"></script>
<script>

    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function () {
        new Switchery($(this)[0], $(this).data());

    });

    $('.change-email-setting').change(function () {
        var id = $(this).data('setting-id');

        if ($(this).is(':checked'))
            var sendEmail = 'yes';
        else
            var sendEmail = 'no';

        var url = '{{route('admin.email-settings.update', ':id')}}';
        url = url.replace(':id', id);
        $.easyAjax({
            url: url,
            type: "POST",
            data: {'id': id, 'send_email': sendEmail, '_method': 'PUT', '_token': '{{ csrf_token() }}'}
        })
    });

    $('#save-form').click(function () {

        var url = '{{route('admin.email-settings.updateMailConfig')}}';

        $.easyAjax({
            url: url,
            type: "POST",
            container: '#updateSettings',
            data: $('#updateSettings').serialize()
        })
    });
</script>
@endpush