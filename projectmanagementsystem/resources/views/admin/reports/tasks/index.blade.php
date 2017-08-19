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
<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/custom-select/custom-select.css') }}">

<link rel="stylesheet" href="{{ asset('plugins/bower_components/morrisjs/morris.css') }}">
@endpush

@section('content')



    <div class="white-box">
        <div class="row m-b-10">
            <h2>@lang("app.filterResults")</h2>
            {!! Form::open(['id'=>'storePayments','class'=>'ajax-form','method'=>'POST']) !!}
            <div class="col-md-5">
                <div class="example">
                    <h5 class="box-title m-t-30">@lang('app.selectDateRange')</h5>

                    <div class="input-daterange input-group" id="date-range">
                        <input type="text" class="form-control" id="start-date" placeholder="Show Results From"
                               value="{{ $fromDate->format('Y-m-d') }}"/>
                        <span class="input-group-addon bg-info b-0 text-white">to</span>
                        <input type="text" class="form-control" id="end-date" placeholder="Show Results To"
                               value="{{ $toDate->format('Y-m-d') }}"/>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h5 class="box-title m-t-30">@lang('app.selectProject')</h5>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <select class="select2 form-control" data-placeholder="@lang('app.selectProject')" id="project_id">
                                <option value=""></option>
                                @foreach($projects as $project)
                                    <option
                                            value="{{ $project->id }}">{{ ucwords($project->project_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <button type="button" class="btn btn-success" id="filter-results"><i class="fa fa-check"></i> @lang('app.apply')
                </button>
            </div>
            {!! Form::close() !!}

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="row row-in">
                    <div class="col-lg-4 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <h3 class="box-title">@lang("modules.taskReport.taskToComplete")</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-layout-list-thumb text-info"></i></li>
                                <li class="text-right"><span id="total-counter" class="counter">{{ $totalTasks }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 row-in-br  b-r-none">
                        <div class="col-in row">
                            <h3 class="box-title">@lang("modules.taskReport.completedTasks")</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-check-box text-success"></i></li>
                                <li class="text-right"><span id="completed-counter" class="counter">{{ $completedTasks }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 b-0">
                        <div class="col-in row">
                            <h3 class="box-title">@lang("modules.taskReport.pendingTasks")</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-alert text-warning"></i></li>
                                <li class="text-right"><span id="pending-counter" class="counter">{{ $pendingTasks }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="white-box">
                <h3 class="box-title">@lang("modules.taskReport.chartTitle")</h3>
                <div>
                    <canvas id="chart3" height="100"></canvas>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('footer-script')


<script src="{{ asset('plugins/bower_components/Chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('plugins/bower_components/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/morrisjs/morris.js') }}"></script>

<script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<script>

    $(".select2").select2();

    jQuery('#date-range').datepicker({
        toggleActive: true,
        format: 'yyyy-mm-dd'
    });

    $('#filter-results').click(function () {
        var token = '{{ csrf_token() }}';
        var url = '{{ route('admin.task-report.store') }}';

        var startDate = $('#start-date').val();

        if (startDate == '') {
            startDate = null;
        }

        var endDate = $('#end-date').val();

        if (endDate == '') {
            endDate = null;
        }

        var projectID = $('#project_id').val();

        $.easyAjax({
            type: 'POST',
            url: url,
            data: {_token: token, startDate: startDate, endDate: endDate, projectId: projectID},
            success: function (response) {

                $('#completed-counter').html(response.completedTasks);
                $('#total-counter').html(response.totalTasks);
                $('#pending-counter').html(response.pendingTasks);

                pieChart(response.completedTasks, response.pendingTasks);
            }
        });
    })

</script>

<script>
    function pieChart(count1, count2) {
        var ctx3 = document.getElementById("chart3").getContext("2d");
        var data3 = [
            {
                value: parseInt(count1),
                color:"#00c292",
                highlight: "#57ecc8",
                label: "Completed Tasks"
            },
            {
                value: parseInt(count2),
                color: "#f1c411",
                highlight: "#f1d877",
                label: "Pending Tasks"
            }
        ];

        var myPieChart = new Chart(ctx3).Pie(data3,{
            segmentShowStroke : true,
            segmentStrokeColor : "#fff",
            segmentStrokeWidth : 0,
            animationSteps : 100,
            tooltipCornerRadius: 0,
            animationEasing : "easeOutBounce",
            animateRotate : true,
            animateScale : false,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
            responsive: true
        });
    }

    pieChart('{{ $completedTasks }}', '{{ $pendingTasks }}');

</script>
@endpush