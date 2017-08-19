@extends('layouts.member-app')

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
                <li><a href="{{ route('member.dashboard') }}">@lang('app.menu.home')</a></li>
                <li><a href="{{ route('member.projects.index') }}">{{ $pageTitle }}</a></li>
                <li class="active">@lang('app.menu.tasks')</li>
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
                                <li><a href="{{ route('member.projects.show', $project->id) }}"><span>@lang('modules.projects.overview')</span></a></li>
                                <li><a href="{{ route('member.project-members.show', $project->id) }}"><span>@lang('modules.projects.members')</span></a></li>
                                <li class="tab-current"><a href="{{ route('member.tasks.show', $project->id) }}"><span>@lang('app.menu.tasks')</span></a></li>
                                <li><a href="{{ route('member.files.show', $project->id) }}"><span>@lang('modules.projects.files')</span></a></li>
                                <li><a href="{{ route('member.time-log.show-log', $project->id) }}"><span>@lang('modules.projects.timeLogs')</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-md-12" id="task-list-panel">
                                    <div class="white-box">
                                        <h2>@lang('app.menu.tasks')</h2>

                                        <div class="row m-b-10">
                                            <div class="col-md-3 col-md-offset-5">
                                                <div class="checkbox checkbox-info">
                                                    <input type="checkbox" id="hide-completed-tasks">
                                                    <label for="hide-completed-tasks">@lang('app.hideCompletedTasks')</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="selectpicker" data-style="form-control" id="sort-task" data-project-id="{{ $project->id }}">
                                                    <option value="id">@lang('modules.tasks.lastCreated')</option>
                                                    <option value="due_date">@lang('modules.tasks.dueSoon')</option>
                                                </select>
                                            </div>
                                        </div>

                                        <ul class="list-group">
                                            @foreach($tasks as $task)
                                                <li class="list-group-item @if($task->status == 'completed') task-completed @endif">
                                                    <div class="row">
                                                        <div class="checkbox checkbox-success checkbox-circle task-checkbox col-md-10">
                                                            <input class="task-check" data-task-id="{{ $task->id }}" id="checkbox{{ $task->id }}" type="checkbox"
                                                                   @if($task->status == 'completed') checked @endif>
                                                            <label for="checkbox{{ $task->id }}">&nbsp;</label>
                                                            <a href="javascript:;" class="text-muted edit-task"
                                                               data-task-id="{{ $task->id }}">{{ ucfirst($task->heading) }}</a>
                                                        </div>
                                                        <div class="col-md-2 text-right">
                                                            <span class="@if($task->due_date->isPast()) text-danger @else text-success @endif m-r-10">{{ $task->due_date->format('d M') }}</span>
                                                            <img src="{{ asset('plugins/images/users/varun.jpg') }}"
                                                                 class="img-circle" height="35" alt="">
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 hide" id="edit-task-panel">
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

<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    //    (function () {
    //
    //        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
    //            new CBPFWTabs(el);
    //        });
    //
    //    })();

    var newTaskpanel = $('#new-task-panel');
    var taskListPanel = $('#task-list-panel');
    var editTaskPanel = $('#edit-task-panel');

    $(".select2").select2();


    //    change task status
    taskListPanel.on('click', '.task-check', function () {
        if ($(this).is(':checked')) {
            var status = 'completed';
        }else{
            var status = 'incomplete';
        }

        var sortBy = $('#sort-task').val();

        var id = $(this).data('task-id');
        var url = "{{route('member.tasks.changeStatus')}}";
        var token = "{{ csrf_token() }}";

        $.easyAjax({
            url: url,
            type: "POST",
            data: {'_token': token, taskId: id, status: status, sortBy: sortBy},
            success: function (data) {
                $('#task-list-panel ul.list-group').html(data.html);
            }
        })
    });

    //    save new task
    taskListPanel.on('click', '.edit-task', function () {
        var id = $(this).data('task-id');
        var url = "{{route('member.tasks.edit', ':id')}}";
        url = url.replace(':id', id);

        $.easyAjax({
            url: url,
            type: "GET",
            data: {taskId: id},
            success: function (data) {
                editTaskPanel.html(data.html);
                taskListPanel.switchClass("col-md-12", "col-md-8", 1000, "easeInOutQuad");
                newTaskpanel.addClass('hide').removeClass('show');
                editTaskPanel.switchClass("hide", "show", 300, "easeInOutQuad");
            }
        })
    });

    //    save new task
    $('#sort-task, #hide-completed-tasks').change(function() {
        var sortBy = $('#sort-task').val();
        var id = $('#sort-task').data('project-id');

        var url = "{{route('member.tasks.sort')}}";
        var token = "{{ csrf_token() }}";

        if ($('#hide-completed-tasks').is(':checked')) {
            var hideCompleted = '1';
        }else {
            var hideCompleted = '0';
        }

        $.easyAjax({
            url: url,
            type: "POST",
            data: {'_token': token, projectId: id, sortBy: sortBy, hideCompleted: hideCompleted},
            success: function (data) {
                $('#task-list-panel ul.list-group').html(data.html);
            }
        })
    });

    $('#show-new-task-panel').click(function () {
//    taskListPanel.switchClass('col-md-12', 'col-md-8', 1000, 'easeInOutQuad');
        taskListPanel.switchClass("col-md-12", "col-md-8", 1000, "easeInOutQuad");
        editTaskPanel.addClass('hide').removeClass('show');
        newTaskpanel.switchClass("hide", "show", 300, "easeInOutQuad");
    });



    editTaskPanel.on('click', '#hide-edit-task-panel', function () {
        editTaskPanel.addClass('hide').removeClass('show');
        taskListPanel.switchClass("col-md-8", "col-md-12", 1000, "easeInOutQuad");
    });

    jQuery('#due_date').datepicker({
        autoclose: true,
        todayHighlight: true
    })

</script>
@endpush