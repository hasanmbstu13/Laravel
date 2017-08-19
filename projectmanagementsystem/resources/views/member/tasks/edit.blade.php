<div class="panel panel-default">
    <div class="panel-heading "><i class="ti-search"></i> @lang('modules.tasks.taskDetail')
        <div class="panel-action">
            <a href="javascript:;" id="hide-new-task-panel" class="close " data-dismiss="modal"><i class="ti-close"></i></a>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">@lang('app.title')</label>
                            <p>  {{ ucfirst($task->heading) }} </p>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">@lang('app.description')</label>
                            <p>  {{  ucfirst($task->description)  }} </p>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">@lang('app.dueDate')</label>
                            <p>  {{  $task->due_date->format('d-M-Y')  }} </p>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">@lang('modules.tasks.assignTo')</label>
                            <p>  {{  $task->user->name  }} </p>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">@lang('modules.tasks.priority')</label>
                                <div  class="clearfix"></div>
                                <label for="radio13" class="text-@if($task->priority == 'high')danger @elseif($task->priority == 'medium')warning @else success @endif ">
                                    @if($task->priority == 'high') @lang('modules.tasks.high') @elseif($task->priority == 'medium') @lang('modules.tasks.medium') @else @lang('modules.tasks.low') @endif</label>

                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('app.status')</label>
                            <div  class="clearfix"></div>
                                <label for="radio13" class="text-@if($task->status == 'incomplete')danger @else success @endif ">
                                    @if($task->status == 'incomplete') @lang('modules.tasks.incomplete') @else @lang('modules.tasks.completed') @endif</label>

                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->

            </div>
            <div class="form-actions">
            </div>
        </div>
    </div>
</div>

<script>
    $('#hide-new-task-panel').click(function () {
        newTaskpanel.addClass('hide').removeClass('show');
        taskListPanel.switchClass("col-md-8", "col-md-12", 1000, "easeInOutQuad");
    });
</script>
