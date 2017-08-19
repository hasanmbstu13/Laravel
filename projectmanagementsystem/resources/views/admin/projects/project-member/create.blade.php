@extends('layouts.app')

@section('page-title')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="{{ $pageIcon }}"></i> {{ $pageTitle }} #{{ $project->id }} - <span class="font-bold">{{ ucwords($project->project_name) }}</span></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}">@lang('app.menu.home')</a></li>
                <li><a href="{{ route('admin.projects.index') }}">{{ $pageTitle }}</a></li>
                <li class="active">@lang('modules.projects.members')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
<link rel="stylesheet" href="{{ asset('plugins/bower_components/icheck/skins/all.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/custom-select/custom-select.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/multiselect/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">
                    <div class="white-box">
                        <nav>
                            <ul>
                                <li ><a href="{{ route('admin.projects.show', $project->id) }}"><span>@lang('modules.projects.overview')</span></a>
                                </li>
                                <li class="tab-current"><a href="{{ route('admin.project-members.show', $project->id) }}"><span>@lang('modules.projects.members')</span></a></li>
                                <li><a href="{{ route('admin.tasks.show', $project->id) }}"><span>@lang('app.menu.tasks')</span></a></li>
                                <li><a href="{{ route('admin.files.show', $project->id) }}"><span>@lang('modules.projects.files')</span></a>
                                </li>
                                <li><a href="{{ route('admin.invoices.show', $project->id) }}"><span>@lang('app.menu.invoices')</span></a></li>
                                <li><a href="{{ route('admin.issues.show', $project->id) }}"><span>@lang('app.client') @lang('app.menu.issues')</span></a></li>
                                <li><a href="{{ route('admin.time-logs.show', $project->id) }}"><span>@lang('app.menu.timeLogs')</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-2" class="show">

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">@lang('modules.projects.members')</div>
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                    @forelse($project->members as $member)
                                                    <div class="row b-b">
                                                        <div class="col-sm-2 p-10">
                                                            {!!  ($member->user->image) ? '<img src="'.asset('storage/avatar/'.$member->user->image).'"
                                                            alt="user" class="img-circle" width="40">' : '<img src="'.asset('default-profile-2.png').'"
                                                            alt="user" class="img-circle" width="40">' !!}

                                                        </div>
                                                        <div class="col-sm-7">
                                                            <h5>{{ ucwords($member->user->name) }}</h5>
                                                            <h6>{{ $member->user->email }}</h6>
                                                        </div>
                                                        <div class="col-sm-3 p-20">
                                                            <a href="javascript:;" data-member-id="{{ $member->id }}" class="btn btn-sm btn-danger btn-rounded delete-members"><i class="fa fa-times"></i> @lang('app.remove')</a>
                                                        </div>
                                                    </div>
                                                    @empty
                                                        @lang('messages.noMemberAddedToProject')
                                                    @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="white-box">
                                        <h3>@lang('modules.projects.addMemberTitle')</h3>

                                        {!! Form::open(['id'=>'createMembers','class'=>'ajax-form','method'=>'POST']) !!}

                                        <div class="form-body">

                                            {!! Form::hidden('project_id', $project->id) !!}

                                            <div class="form-group" id="user_id">
                                                <select class="select2 m-b-10 select2-multiple " multiple="multiple"
                                                        data-placeholder="Choose Members" name="user_id[]">
                                                    @foreach($employees as $emp)
                                                        <option value="{{ $emp->id }}">{{ ucwords($emp->name). ' ['.$emp->email.']' }} @if($emp->id == $user->id)
                                                                (YOU) @endif</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" id="save-members" class="btn btn-success"><i
                                                            class="fa fa-check"></i> @lang('app.save')
                                                </button>
                                            </div>
                                        </div>

                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>

                        </section>

                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->

@endsection

@push('footer-script')
<script src="{{ asset('js/cbpFWTabs.js') }}"></script>
<script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
//    (function () {
//
//        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
//            new CBPFWTabs(el);
//        });
//
//    })();

    $(".select2").select2();

    //    save project members
    $('#save-members').click(function () {
        $.easyAjax({
            url: '{{route('admin.project-members.store')}}',
            container: '#createMembers',
            type: "POST",
            data: $('#createMembers').serialize(),
            success: function (response) {
                if (response.status == "success") {
                    $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                    window.location.reload();
                }
            }
        })
    });


$('body').on('click', '.delete-members', function(){
    var id = $(this).data('member-id');
    swal({
        title: "Are you sure?",
        text: "This will remove the member from the project.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        cancelButtonText: "No, cancel please!",
        closeOnConfirm: true,
        closeOnCancel: true
    }, function(isConfirm){
        if (isConfirm) {

            var url = "{{ route('admin.project-members.destroy',':id') }}";
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