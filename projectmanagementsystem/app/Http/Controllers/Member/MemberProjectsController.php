<?php

namespace App\Http\Controllers\Member;

use App\EmployeeDetails;
use App\Helper\Reply;
use App\Http\Requests\User\UpdateProfile;
use App\Issue;
use App\ModuleSetting;
use App\Project;
use App\ProjectActivity;
use App\ProjectTimeLog;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class MemberProjectsController
 * @package App\Http\Controllers\Member
 */
class MemberProjectsController extends MemberBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('app.menu.projects');
        $this->pageIcon = 'icon-layers';

        if(!ModuleSetting::employeeModule('projects')){
            abort(403);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('member.projects.index', $this->data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $this->userDetail = auth()->user();

        $this->project = Project::find($id);

        // Check authorised user

        if($this->project->checkProjectUser())
        {
            $this->activeTimers = ProjectTimeLog::projectActiveTimers($this->project->id);

            $this->openTasks = Task::projectOpenTasks($this->project->id, $this->userDetail->id);
            $this->openTasksPercent = (count($this->openTasks) == 0 ? '0' : (count($this->openTasks) / count($this->project->tasks)) * 100);

            $this->daysLeft = $this->project->deadline->diff(Carbon::now())->format('%d')+($this->project->deadline->diff(Carbon::now())->format('%m')*30)+($this->project->deadline->diff(Carbon::now())->format('%y')*12);
            $this->daysLeftFromStartDate = $this->project->deadline->diff($this->project->start_date)->format('%d')+($this->project->deadline->diff($this->project->start_date)->format('%m')*30)+($this->project->deadline->diff($this->project->start_date)->format('%y')*12);
            $this->daysLeftPercent = ($this->daysLeft / $this->daysLeftFromStartDate) * 100;

            $this->hoursLogged = ProjectTimeLog::projectTotalHours($this->project->id);
            $this->pendingIssues = Issue::projectIssuesPending($this->project->id, $this->userDetail->id);

            $this->pendingIssuesPercent = (count($this->pendingIssues) == 0 ? '0' : (count($this->pendingIssues) / count($this->project->issues)) * 100);
            $this->activities = ProjectActivity::getProjectActivities($id, 10, $this->userDetail->id);

            return view('member.projects.show', $this->data);
        }
        else{
            // If not authorised user
            return redirect(route('member.dashboard'));
        }


    }

    public function data()
    {
        $this->userDetail = auth()->user();
        $projects = Project::select('projects.id', 'projects.project_name', 'projects.project_summary', 'projects.start_date', 'projects.deadline', 'projects.notes', 'projects.category_id', 'projects.client_id', 'projects.feedback', 'projects.completion_percent', 'projects.created_at', 'projects.updated_at')
            ->join('project_members', 'project_members.project_id', '=', 'projects.id')
            ->where('project_members.user_id', '=', $this->userDetail->id);

        return Datatables::of($projects)
            ->addColumn('action', function($row){
                return '<a href="'.route('member.projects.show', [$row->id]).'" class="btn btn-success btn-circle"
                      data-toggle="tooltip" data-original-title="View Project Details"><i class="fa fa-search" aria-hidden="true"></i></a>';
            })
            ->addColumn('members', function ($row) {
                $members = '';

                if (count($row->members) > 0) {
                    foreach ($row->members as $member) {
                        $members .= ($member->user->image) ? '<img data-toggle="tooltip" data-original-title="' . ucwords($member->user->name) . '" src="' . asset('storage/avatar/' . $member->user->image) . '"
                        alt="user" class="img-circle" width="30"> ' : '<img data-toggle="tooltip" data-original-title="' . ucwords($member->user->name) . '" src="' . asset('default-profile-2.png') . '"
                        alt="user" class="img-circle" width="30"> ';
                    }
                }
                else{
                    $members.= __('messages.noMemberAddedToProject');
                }
                return $members;
            })

            ->editColumn('project_name', function($row){
                return '<a href="'.route('member.projects.show', $row->id).'">'.ucfirst($row->project_name).'</a>';
            })
            ->editColumn('start_date', function($row){
                return $row->start_date->format('d M, Y');
            })
            ->editColumn('deadline', function($row){
                return $row->deadline->format('d M, Y');
            })
            ->editColumn('client_id', function($row){
                return ucwords($row->client->name);
            })
            ->editColumn('completion_percent', function ($row) {
                if ($row->completion_percent < 50) {
                    $statusColor = 'danger';
                }
                elseif ($row->completion_percent >= 50 && $row->completion_percent < 75) {
                    $statusColor = 'warning';
                }
                else {
                    $statusColor = 'success';
                }

                return '<h5>Completed<span class="pull-right">' . $row->completion_percent . '%</span></h5><div class="progress">
                  <div class="progress-bar progress-bar-' . $statusColor . '" aria-valuenow="' . $row->completion_percent . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $row->completion_percent . '%" role="progressbar"> <span class="sr-only">' . $row->completion_percent . '% Complete</span> </div>
                </div>';
            })
            ->rawColumns(['project_name', 'action', 'members', 'completion_percent'])
            ->removeColumn('project_summary')
            ->removeColumn('notes')
            ->removeColumn('category_id')
            ->removeColumn('feedback')
            ->removeColumn('start_date')
            ->make(true);
    }

}
