@foreach($project->tasks as $task)
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