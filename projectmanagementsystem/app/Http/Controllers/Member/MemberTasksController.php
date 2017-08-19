<?php

namespace App\Http\Controllers\Member;

use App\EmployeeDetails;
use App\Helper\Reply;
use App\Http\Requests\ProjectMembers\StoreProjectMembers;
use App\Http\Requests\User\UpdateProfile;
use App\Issue;
use App\ModuleSetting;
use App\Project;
use App\ProjectActivity;
use App\ProjectMember;
use App\ProjectTimeLog;
use App\Task;
use App\Traits\ProjectProgress;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class MemberProjectsController
 * @package App\Http\Controllers\Member
 */
class MemberTasksController extends MemberBaseController
{
    use ProjectProgress;

    public function __construct() {
        parent::__construct();
        $this->pageIcon = 'icon-layers';
        $this->pageTitle = __('app.menu.projects');

        if(!ModuleSetting::employeeModule('projects')){
            abort(403);
        }
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
    public function store(StoreProjectMembers $request)
    {
        //
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
        $this->tasks = Task::where('project_id', $id)->where('user_id', $this->user->id)->get();
        return view('member.tasks.show', $this->data);
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
        $view = view('member.tasks.edit', $this->data)->render();
        return Reply::successWithData('', ['html' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     * @throws \Throwable
     */
    public function changeStatus(Request $request)
    {
        $taskId = $request->taskId;
        $status = $request->status;

        $task = Task::find($taskId);

        if(auth()->user()->id == $task->user_id)
        {
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
            $this->project->tasks = Task::whereProjectId($this->project->id)
                ->where('user_id', $this->user->id)
                ->orderBy($request->sortBy, 'desc')
                ->get();

            $view = view('member.tasks.task-list-ajax', $this->data)->render();

            $this->logUserActivity($this->user->id, __('messages.taskUpdated').'<i>'.strtolower($task->status).'</i> : <strong>'.ucfirst($task->heading).'</strong>');

            return Reply::successWithData(__('messages.taskUpdatedSuccessfully'), ['html' => $view]);

        }else{
            return Reply::error(Lang::get('messages.unAuthorisedUser'));
        }

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

        $tasks = Task::whereProjectId($projectId)
            ->where('user_id', $this->user->id)
            ->orderBy($request->sortBy, $order);

        if($request->hideCompleted == '1'){
            $tasks->where('status', 'incomplete');
        }

        $this->project->tasks = $tasks->get();

        $view = view('member.tasks.task-list-ajax', $this->data)->render();

        return Reply::successWithData('', ['html' => $view]);
    }

}
