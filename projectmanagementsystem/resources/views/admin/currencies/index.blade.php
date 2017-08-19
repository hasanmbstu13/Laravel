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

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">@lang('modules.currencySettings.currencies')</h3>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <a href="{{ route('admin.currency.create') }}" class="btn btn-outline btn-success btn-sm">@lang('modules.currencySettings.addNewCurrency') <i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>@lang('modules.currencySettings.currencyName')</th>
                            <th>@lang('modules.currencySettings.currencySymbol')</th>
                            <th>@lang('modules.currencySettings.currencyCode')</th>
                            <th class="text-nowrap">@lang('app.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($currencies as $currency)
                            <tr>
                                <td>{{ ucwords($currency->currency_name) }}</td>
                                <td>{{ $currency->currency_symbol }}</td>
                                <td>{{ $currency->currency_code }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.currency.edit', [$currency->id]) }}" class="btn btn-info btn-circle"
                                       data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                    <a href="javascript:;" class="btn btn-danger btn-circle sa-params"
                                       data-toggle="tooltip" data-currency-id="{{ $currency->id }}" data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

@endsection

@push('footer-script')
<script>

    $('body').on('click', '.sa-params', function(){
        var id = $(this).data('currency-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted currency!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {

                var url = "{{ route('admin.currency.destroy',':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'DELETE',
                    url: url,
                    data: {'_token': token},
                    success: function (response) {
                        if (response.status == "success") {
                            $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });

</script>
@endpush