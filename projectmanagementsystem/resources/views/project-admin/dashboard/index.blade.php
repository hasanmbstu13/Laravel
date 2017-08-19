@extends('layouts.project-admin-app')

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
                <li><a href="{{ route('project-admin.dashboard') }}">@lang('app.menu.home')</a></li>
                <li class="active">{{ $pageTitle }}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
<link rel="stylesheet" href="{{ asset('plugins/bower_components/morrisjs/morris.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="row row-in">
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <h3 class="box-title">@lang('modules.dashboard.totalProjects')</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-clock text-info"></i></li>
                                <li class="text-right"><span class="counter">{{ floor($counts->totalProjects) }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6  b-r-none row-in-br">
                        <div class="col-in row">
                            <h3 class="box-title">@lang('modules.dashboard.totalPendingTasks')</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-alert text-warning"></i></li>
                                <li class="text-right"><span class="counter">{{ $counts->totalPendingTasks }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br ">
                        <div class="col-in row">
                            <h3 class="box-title">@lang('modules.dashboard.totalCompletedTasks')</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-check-box text-success"></i></li>
                                <li class="text-right"><span class="counter">{{ $counts->totalCompletedTasks }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6  b-0">
                        <div class="col-in row">
                            <h3 class="box-title">@lang('modules.dashboard.totalPendingIssues')</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-alert text-danger"></i></li>
                                <li class="text-right"><span class="counter">{{ $counts->totalPendingIssues }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('modules.dashboard.overdueTasks')</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <ul class="list-task list-group" data-role="tasklist">
                            <li class="list-group-item" data-role="task">
                                <strong>@lang('app.title')</strong> <span
                                        class="pull-right"><strong>@lang('modules.dashboard.dueDate')</strong></span>
                            </li>
                            @forelse($pendingTasks as $key=>$task)
                                <li class="list-group-item" data-role="task">
                                    {{ ($key+1).'. '.ucfirst($task->heading) }} <a href="{{ route('admin.projects.show', $task->project_id) }}" class="text-danger">{{ ucwords($task->project->project_name) }}</a> <label
                                            class="label label-danger pull-right">{{ $task->due_date->format('d M') }}</label>
                                </li>
                            @empty
                                <li class="list-group-item" data-role="task">
                                    @lang("messages.noOpenTasks")
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('modules.dashboard.pendingClientIssues')</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <ul class="list-task list-group" data-role="tasklist">
                            @forelse($pendingIssues as $key=>$issue)
                                <li class="list-group-item" data-role="task">
                                    {{ ($key+1).'. '.ucfirst($issue->description) }} <a href="{{ route('admin.projects.show', $issue->project_id) }}" class="text-danger">{{ ucwords($issue->project->project_name) }}</a>
                                </li>
                            @empty
                                <li class="list-group-item" data-role="task">
                                    @lang("messages.noOpenIssues")
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row" >

        <div class="col-md-6" id="section-line-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('modules.dashboard.projectActivityTimeline')</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="steamline">
                            @foreach($projectActivities as $activ)
                                <div class="sl-item">
                                    <div class="sl-left"><i class="fa fa-circle text-info"></i>
                                    </div>
                                    <div class="sl-right">
                                        <div><h6><a href="{{ route('project-admin.projects.show', $activ->project_id) }}" class="text-danger">{{ ucwords($activ->project->project_name) }}:</a> {{ $activ->activity }}</h6> <span class="sl-date">{{ $activ->created_at->diffForHumans() }}</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('modules.dashboard.userActivityTimeline')</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="steamline">
                            @forelse($userActivities as $key=>$activity)
                                <div class="sl-item">
                                    <div class="sl-left">
                                        {!!  ($activity->user->image) ? '<img src="'.asset('storage/avatar/'.$activity->user->image).'"
                                                                    alt="user" class="img-circle">' : '<img src="'.asset('default-profile-2.png').'"
                                                                    alt="user" class="img-circle">' !!}
                                    </div>
                                    <div class="sl-right">
                                        <div class="m-l-40"><span class="text-success">{{ ucwords($activity->user->name) }}</span> <span  class="sl-date">{{ $activity->created_at->diffForHumans() }}</span>
                                            <p>{!! ucfirst($activity->activity) !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @if(count($userActivities) > ($key+1))
                                    <hr>
                                @endif
                            @empty
                                <div>@lang("messages.noActivityByThisUser")</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>


@endsection
