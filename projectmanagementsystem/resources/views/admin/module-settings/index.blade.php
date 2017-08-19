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
                <h3 class="box-title m-b-0">@lang("modules.moduleSettings.employeeModuleTitle")</h3>

                <p class="text-muted m-b-10 font-13">
                    @lang("modules.moduleSettings.employeeSubTitle")
                </p>

                <div class="row">
                    <div class="col-sm-12 col-xs-12 b-t p-t-20">
                        {!! Form::open(['id'=>'editSettings','class'=>'ajax-form form-horizontal','method'=>'PUT']) !!}

                        @foreach($employeeModules as $setting)
                            <div class="form-group">
                                <label class="control-label col-xs-6" >{{ ucwords($setting->module_name) }}</label>
                                <div class="col-xs-6">
                                    <div class="switchery-demo">
                                        <input type="checkbox" @if($setting->status == 'active') checked @endif class="js-switch change-module-setting" data-color="#f1c411" data-setting-id="{{ $setting->id }}" />
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
            <div class="white-box">
                <h3 class="box-title m-b-0">@lang("modules.moduleSettings.clientModuleTitle")</h3>

                <p class="text-muted m-b-10 font-13">
                    @lang("modules.moduleSettings.clientSubTitle")
                </p>

                <div class="row">
                    <div class="col-sm-12 col-xs-12 b-t p-t-20">
                        {!! Form::open(['id'=>'editSettings-2','class'=>'ajax-form form-horizontal','method'=>'PUT']) !!}

                        @foreach($clientModules as $setting)
                            <div class="form-group">
                                <label class="control-label col-xs-6" >{{ ucwords($setting->module_name) }}</label>
                                <div class="col-xs-6">
                                    <div class="switchery-demo">
                                        <input type="checkbox" @if($setting->status == 'active') checked @endif class="js-switch change-module-setting" data-color="#00c292" data-setting-id="{{ $setting->id }}" />
                                    </div>
                                </div>
                            </div>
                        @endforeach

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
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());

    });

    $('.change-module-setting').change(function () {
        var id = $(this).data('setting-id');

        if($(this).is(':checked'))
            var moduleStatus = 'active';
        else
            var moduleStatus = 'disabled';

        var url = '{{route('admin.module-settings.update', ':id')}}';
        url = url.replace(':id', id);
        $.easyAjax({
            url: url,
            type: "POST",
            data: { 'id': id, 'status': moduleStatus, '_method': 'PUT', '_token': '{{ csrf_token() }}' }
        })
    });
</script>
@endpush