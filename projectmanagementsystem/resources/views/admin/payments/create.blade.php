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
                <li><a href="{{ route('admin.payments.index') }}">{{ $pageTitle }}</a></li>
                <li class="active">@lang('app.addNew')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
<link rel="stylesheet" href="{{ asset('plugins/bower_components/custom-select/custom-select.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/switchery/dist/switchery.min.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="panel ">
                <div class="panel-heading"> @lang('modules.payments.addPayment')</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        {!! Form::open(['id'=>'createPayment','class'=>'ajax-form','method'=>'POST']) !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>@lang('modules.payments.selectInvoice')</label>
                                        <select class="select2 form-control" data-placeholder="@lang('modules.payments.selectInvoice')" name="invoice_id">
                                            @foreach($invoices as $invoice)
                                                <option
                                                        value="{{ $invoice->id }}">{{ '#'.$invoice->invoice_number.' ('.$invoice->currency->currency_symbol.$invoice->total.') (Project - '.ucfirst($invoice->project->project_name).')' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!--/span-->
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('modules.payments.paymentGateway')</label>
                                        <input type="text" name="gateway" id="gateway" class="form-control">
                                        <span class="help-block"> Paypal, Authorize.net, Stripe, Bank Transfer, Cash or others.</span>
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('modules.payments.transactionId')</label>
                                        <input type="text" name="transaction_id" id="transaction_id" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('modules.payments.paidOn')</label>
                                        <input type="text" class="form-control" name="paid_on" id="paid_on" value="{{ Carbon\Carbon::today()->format('m/d/Y') }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" >@lang('modules.payments.markInvoicePaid')</label>
                                            <div class="switchery-demo">
                                                <input type="checkbox" name="invoice_paid" class="js-switch " data-color="#00c292" data-secondary-color="#f96262"  />
                                            </div>
                                    </div>
                                </div>

                            </div>


                            <!--/span-->


                        </div>
                        <div class="form-actions">
                            <button type="submit" id="save-form-2" class="btn btn-success"><i class="fa fa-check"></i>
                                @lang('app.save')
                            </button>
                            <button type="reset" class="btn btn-default">@lang('app.reset')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

@endsection

@push('footer-script')
<script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/switchery/dist/switchery.min.js') }}"></script>
<script>

    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());

    });

    $(".select2").select2();

    jQuery('#paid_on').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#save-form-2').click(function () {
        $.easyAjax({
            url: '{{route('admin.payments.store')}}',
            container: '#createPayment',
            type: "POST",
            redirect: true,
            data: $('#createPayment').serialize()
        })
    });
</script>
@endpush