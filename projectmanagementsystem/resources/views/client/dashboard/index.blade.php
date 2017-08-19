@extends('layouts.client-app')

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
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="row row-in">
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <h3 class="box-title">@lang('modules.dashboard.totalProjects')</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-layers text-info"></i></li>
                                <li class="text-right"><span class="counter">{{ $counts->totalProjects }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                        <div class="col-in row">
                            <h3 class="box-title">@lang("modules.dashboard.totalPendingIssues")</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-clock text-warning"></i></li>
                                <li class="text-right"><span class="counter">{{ $counts->totalPendingIssues }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6  row-in-br">
                        <div class="col-in row">
                            <h3 class="box-title">@lang("modules.dashboard.totalPaidAmount")</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-alert text-danger"></i></li>
                                <li class="text-right"><span class="counter">{{ floor($counts->totalPaidAmount) }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 b-0">
                        <div class="col-in row">
                            <h3 class="box-title">@lang("modules.dashboard.totalOutstandingAmount")</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-check-box text-success"></i></li>
                                <li class="text-right"><span class="counter">{{ floor($counts->totalUnpaidAmount) }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

    <div class="row" >

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">@lang("modules.dashboard.pendingClientIssues")</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <ul class="list-task list-group" data-role="tasklist">
                            @forelse($pendingIssues as $key=>$issue)
                                <li class="list-group-item" data-role="task">
                                    {{ ($key+1).'. '.ucfirst($issue->description) }}
                                </li>
                            @empty
                                <li class="list-group-item" data-role="task">
                                    @lang('messages.noOpenIssues')
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6" id="section-line-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang("modules.dashboard.projectActivityTimeline")</div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="steamline">
                            @foreach($projectActivities as $activ)
                                <div class="sl-item">
                                    <div class="sl-left"><i class="fa fa-circle text-info"></i>
                                    </div>
                                    <div class="sl-right">
                                        <div><h6><a href="{{ route('admin.projects.show', $activ->project_id) }}" class="text-danger">{{ ucwords($activ->project->project_name) }}:</a> {{ $activ->activity }}</h6> <span class="sl-date">{{ $activ->created_at->diffForHumans() }}</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection