<?php

namespace App\Http\Controllers\ProjectAdmin;

use App\Helper\Reply;
use App\Http\Requests\Project\StoreProject;
use App\Issue;
use App\ProjectActivity;
use App\ProjectCategory;
use App\ProjectTimeLog;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Facades\Datatables;
use App\Traits\ProjectProgress;

class ProjectAdminProjectsController extends ProjectAdminBaseController
{

    use ProjectProgress;

    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.projects');
        $this->pageIcon = 'icon-layers';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('project-admin.projects.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $this->clients = User::allClients();
        $this->categories = ProjectCategory::all();
        return view('project-admin.projects.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject $request) {
        $project = new Project();
        $project->project_name = $request->project_name;
        if ($request->project_summary != '') {
            $project->project_summary = $request->project_summary;
        }
        $project->start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $project->deadline = Carbon::parse($request->deadline)->format('Y-m-d');
        if ($request->notes != '') {
            $project->notes = $request->notes;
        }
        if ($request->category_id != '') {
            $project->category_id = $request->category_id;
        }
        $project->client_id = $request->client_id;
        $project->save();

        $this->logProjectActivity($project->id, ucwords($project->project_name) . ' added as new project.');
        return Reply::redirect(route('project-admin.projects.edit', [$project->id]), 'Project added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $this->project = Project::find($id);
        $this->activeTimers = ProjectTimeLog::projectActiveTimers($this->project->id);
        $this->openTasks = Task::projectOpenTasks($this->project->id);
        $this->openTasksPercent = (count($this->openTasks) == 0 ? "0" : (count($this->openTasks) / count($this->project->tasks)) * 100);
        $this->daysLeft = $this->project->deadline->diff(Carbon::now())->format('%d')+($this->project->deadline->diff(Carbon::now())->format('%m')*30)+($this->project->deadline->diff(Carbon::now())->format('%y')*12);
        $this->daysLeftFromStartDate = $this->project->deadline->diff($this->project->start_date)->format('%d')+($this->project->deadline->diff($this->project->start_date)->format('%m')*30)+($this->project->deadline->diff($this->project->start_date)->format('%y')*12);
        $this->daysLeftPercent = ($this->daysLeft / $this->daysLeftFromStartDate) * 100;
        $this->hoursLogged = ProjectTimeLog::projectTotalHours($this->project->id);
        $this->pendingIssues = Issue::projectIssuesPending($this->project->id);
        $this->pendingIssuesPercent = (count($this->pendingIssues) == 0 ? "0" : (count($this->pendingIssues) / count($this->project->issues)) * 100);
        $this->activities = ProjectActivity::getProjectActivities($id, 10);
//        $this->completedTasks = Task::projectCompletedTasks($this->project->id);
        return view('project-admin.projects.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $this->clients = User::allClients();
        $this->categories = ProjectCategory::all();
        $this->project = Project::find($id);
        return view('project-admin.projects.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProject $request, $id) {
        $project = Project::find($id);
        $project->project_name = $request->project_name;
        if ($request->project_summary != '') {
            $project->project_summary = $request->project_summary;
        }
        $project->start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $project->deadline = Carbon::parse($request->deadline)->format('Y-m-d');
        if ($request->notes != '') {
            $project->notes = $request->notes;
        }
        if ($request->category_id != '') {
            $project->category_id = $request->category_id;
        }
        $project->client_id = $request->client_id;
        $project->feedback = $request->feedback;

        if($request->calculate_task_progress){
            $project->calculate_task_progress = $request->calculate_task_progress;
            $project->completion_percent = $this->calculateProjectProgress($id);
        }
        else{
            $project->calculate_task_progress = "false";
            $project->completion_percent = $request->completion_percent;
        }


        $project->save();

        $this->logProjectActivity($project->id, ucwords($project->project_name) . __('modules.projects.projectUpdated'));
        return Reply::redirect(route('project-admin.projects.edit', $id), __('messages.projectUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Project::destroy($id);
        return Reply::success(__('messages.projectDeleted'));
    }

    public function data() {
        $projects = Project::all();

        return Datatables::of($projects)
            ->addColumn('action', function ($row) {
                return '<a href="' . route('project-admin.projects.edit', [$row->id]) . '" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                      <a href="' . route('project-admin.projects.show', [$row->id]) . '" class="btn btn-success btn-circle"
                      data-toggle="tooltip" data-original-title="View Project Details"><i class="fa fa-search" aria-hidden="true"></i></a>

                      <a href="javascript:;" class="btn btn-danger btn-circle sa-params"
                      data-toggle="tooltip" data-user-id="' . $row->id . '" data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>';
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
                    $members.= 'No member assigned to this project';
                }
                return $members;
            })
            ->editColumn('project_name', function ($row) {
                return '<a href="' . route('project-admin.projects.show', $row->id) . '">' . ucfirst($row->project_name) . '</a>';
            })
            ->editColumn('start_date', function ($row) {
                return $row->start_date->format('d M, Y');
            })
            ->editColumn('deadline', function ($row) {
                return $row->deadline->format('d M, Y');
            })
            ->editColumn('client_id', function ($row) {
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
            ->rawColumns(['project_name', 'action', 'completion_percent', 'members'])
            ->removeColumn('project_summary')
            ->removeColumn('notes')
            ->removeColumn('category_id')
            ->removeColumn('feedback')
            ->removeColumn('start_date')
            ->make(true);
    }

    public function export() {
        $rows = Project::leftJoin('users', 'users.id', '=', 'projects.client_id')
            ->join('project_category', 'project_category.id', '=', 'projects.category_id')
            ->select(
                'projects.id',
                'projects.project_name',
                'users.name',
                'project_category.category_name',
                'projects.start_date',
                'projects.deadline',
                'projects.completion_percent',
                'projects.created_at'
            )
            ->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $exportArray = [];

        // Define the Excel spreadsheet headers
        $exportArray[] = ['ID', 'Project Name', 'Client Name', 'Category', 'Start Date', 'Deadline', 'Completion Percent', 'Created at'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($rows as $row) {
            $exportArray[] = $row->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('Projects', function($excel) use ($exportArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Projects');
            $excel->setCreator('Worksuite')->setCompany($this->companyName);
            $excel->setDescription('Projects file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($exportArray) {
                $sheet->fromArray($exportArray, null, 'A1', false, false);

                $sheet->row(1, function($row) {

                    // call row manipulation methods
                    $row->setFont(array(
                        'bold'       =>  true
                    ));

                });

            });



        })->download('xlsx');
    }


}
