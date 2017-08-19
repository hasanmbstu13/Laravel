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
                <li><a href="{{ route('admin.employees.index') }}">{{ $pageTitle }}</a></li>
                <li class="active">@lang('app.edit')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> @lang('modules.employees.updateTitle')</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        {!! Form::open(['id'=>'updateEmployee','class'=>'ajax-form','method'=>'PUT']) !!}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>@lang('modules.employees.employeeName')</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $userDetail->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('modules.employees.employeeEmail')</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $userDetail->email }}">
                                            <span class="help-block">Employee will login using this email.</span>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('modules.employees.employeePassword')</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                            <span class="help-block"> @lang('modules.employees.updatePasswordNote')</span>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('app.mobile')</label>
                                            <input type="tel" name="mobile" id="mobile" class="form-control" value="{{ $userDetail->mobile }}">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label">@lang('app.address')</label>
                                            <textarea name="address"  id="address"  rows="5" class="form-control">{{ $employeeDetail->address or '' }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <!--/span-->

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('modules.employees.jobTitle')</label>
                                            <input type="text" name="job_title" id="job_title" class="form-control"  value="{{ $employeeDetail->job_title or '' }}">
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('modules.employees.hourlyRate')</label>
                                            <input type="number" name="hourly_rate" id="hourly_rate" class="form-control" value="{{ $employeeDetail->hourly_rate or '' }}">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->

                            </div>
                            <div class="form-actions">
                                <button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> @lang('app.update')</button>
                                <a href="{{ route('admin.employees.index') }}" class="btn btn-default">@lang('app.back')</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

@endsection

@push('footer-script')
<script>
    $('#save-form').click(function () {
        $.easyAjax({
            url: '{{route('admin.employees.update', [$userDetail->id])}}',
            container: '#updateEmployee',
            type: "POST",
            redirect: true,
            data: $('#updateEmployee').serialize()
        })
    });
</script>
@endpush

