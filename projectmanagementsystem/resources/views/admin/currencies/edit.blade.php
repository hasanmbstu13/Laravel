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
                <li><a href="{{ route('admin.currency.index') }}">{{ $pageTitle }}</a></li>
                <li class="active">@lang('app.update')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="white-box">
                <h3 class="box-title m-b-0">@lang("modules.currencySettings.updateTitle")</h3>

                <p class="text-muted m-b-30 font-13"></p>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        {!! Form::open(['id'=>'updateCurrency','class'=>'ajax-form','method'=>'PUT']) !!}
                        <div class="form-group">
                            <label for="company_name">@lang("modules.currencySettings.currencyName")</label>
                            <input type="text" class="form-control" id="currency_name" name="currency_name" value="{{ $currency->currency_name }}">
                        </div>
                        <div class="form-group">
                            <label for="company_email">@lang("modules.currencySettings.currencySymbol")</label>
                            <input type="text" class="form-control" id="currency_symbol" name="currency_symbol" value="{{ $currency->currency_symbol }}">
                        </div>
                        <div class="form-group">
                            <label for="company_phone">@lang("modules.currencySettings.currencyCode")</label>
                            <input type="text" class="form-control" id="currency_code" name="currency_code" value="{{ $currency->currency_code }}">
                        </div>

                        <button type="submit" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                            @lang('app.save')
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
<script>
    $('#save-form').click(function () {
        $.easyAjax({
            url: '{{route('admin.currency.update', $currency->id )}}',
            container: '#updateCurrency',
            type: "POST",
            data: $('#updateCurrency').serialize()
        })
    });
</script>
@endpush

