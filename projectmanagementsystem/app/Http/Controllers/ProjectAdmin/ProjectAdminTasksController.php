<?php

namespace App\Http\Controllers\ProjectAdmin;

use App\Helper\Reply;
use App\Http\Requests\Tasks\StoreTask;
use App\Notifications\NewTask;
use App\Project;
use App\Task;
use App\Traits\ProjectProgress;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectAdminTasksController extends ProjectAdminBaseController
{

    use ProjectProgress;

    public function __construct() {
        parent::__construct();
        $this->pageIcon = 'icon-layers';
        $this->pageTitle = __('app.menu.projects');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        $task = new Task();
        $task->heading = $request->heading;
        if($request->description != ''){
            $task->description = $request->description;
        }
        $task->due_date = Carbon::parse($request->due_date)->format('Y-m-d');
        $task->user_id = $request->user_id;
        $task->project_id = $request->project_id;
        $task->priority = $request->priority;
        $task->status = 'incomplete';
        $task->save();

//      Send notification to user
        $notifyUser = User::find($request->user_id);
        $notifyUser->notify(new NewTask($task));

        $this->logProjectActivity($request->project_id, __('messages.newTaskAddedToTheProject'));

        $this->project = Project::find($task->project_id);
        $view = view('project-admin.projects.tasks.task-list-ajax', $this->data)->render();

        //calculate project progress if enabled
        $this->calculateProjectProgress($request->project_id);

        return Reply::successWithData(__('messages.taskCreatedSuccessfully'), ['html' => $view]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->project = Project::find($id);
        return view('project-admin.projects.tasks.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->task = Task::find($id);
        $view = view('project-admin.projects.tasks.edit', $this->data)->render();
        return Reply::dataOnly(['html' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTask $request, $id)
    {
        $task = Task::find($id);
        $task->heading = $request->heading;
        if($request->description != ''){
            $task->description = $request->description;
        }
        $task->due_date = Carbon::parse($request->due_date)->format('Y-m-d');
        $task->user_id = $request->user_id;
        $task->priority = $request->priority;
        $task->status = $request->status;

        if($task->status == 'completed'){
            $task->completed_on = Carbon::today()->format('Y-m-d');
        }else{
            $task->completed_on = null;
        }

        $task->save();

        //calculate project progress if enabled
        $this->calculateProjectProgress($request->project_id);

        $this->project = Project::find($task->project_id);

        $view = view('project-admin.projects.tasks.task-list-ajax', $this->data)->render();

        return Reply::successWithData(__('messages.taskUpdatedSuccessfully'), ['html' => $view]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request) {
        $taskId = $request->taskId;
        $status = $request->status;

        $task = Task::find($taskId);
        $task->status = $status;

        if($task->status == 'completed'){
            $task->completed_on = Carbon::today()->format('Y-m-d');
        }else{
            $task->completed_on = null;
        }

        $task->save();

        //calculate project progress if enabled
        $this->calculateProjectProgress($task->project_id);

        $this->project = Project::find($task->project_id);
        $this->project->tasks = Task::whereProjectId($this->project->id)->orderBy($request->sortBy, 'desc')->get();

        $view = view('project-admin.projects.tasks.task-list-ajax', $this->data)->render();

        return Reply::successWithData(__('messages.taskUpdatedSuccessfully'), ['html' => $view]);
    }

    public function sort(Request $request) {
        $projectId = $request->projectId;
        $this->sortBy = $request->sortBy;

        $this->project = Project::find($projectId);
        if($request->sortBy == 'due_date'){
            $order = "asc";
        }
        else{
            $order = "desc";
        }

        $tasks = Task::whereProjectId($projectId)->orderBy($request->sortBy, $order);

        if($request->hideCompleted == '1'){
            $tasks->where('status', 'incomplete');
        }

        $this->project->tasks = $tasks->get();

        $view = view('project-admin.projects.tasks.task-list-ajax', $this->data)->render();

        return Reply::successWithData('', ['html' => $view]);
    }
}
