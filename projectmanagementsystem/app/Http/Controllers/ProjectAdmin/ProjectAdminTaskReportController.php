<?php

namespace App\Http\Controllers\ProjectAdmin;

use App\Helper\Reply;
use App\Project;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectAdminTaskReportController extends ProjectAdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.taskReport');
        $this->pageIcon = 'ti-pie-chart';
    }

    public function index() {
        $this->projects = Project::all();
        $this->fromDate = Carbon::today()->subDays(30);
        $this->toDate = Carbon::today();

        $this->totalTasks = Task::where(DB::raw('DATE(`due_date`)'), '>=', $this->fromDate->format('Y-m-d'))
            ->where(DB::raw('DATE(`due_date`)'), '<=', $this->toDate->format('Y-m-d'))
            ->count();

        $this->completedTasks = Task::where(DB::raw('DATE(`due_date`)'), '>=', $this->fromDate->format('Y-m-d'))
            ->where(DB::raw('DATE(`due_date`)'), '<=', $this->toDate->format('Y-m-d'))
            ->where('status', 'completed')
            ->count();

        $this->pendingTasks = Task::where(DB::raw('DATE(`due_date`)'), '>=', $this->fromDate->format('Y-m-d'))
            ->where(DB::raw('DATE(`due_date`)'), '<=', $this->toDate->format('Y-m-d'))
            ->where('status', 'incomplete')
            ->count();

        return view('project-admin.reports.tasks.index', $this->data);
    }

    public function store(Request $request){

        $totalTasks = Task::where(DB::raw('DATE(`due_date`)'), '>=', $request->startDate)
            ->where(DB::raw('DATE(`due_date`)'), '<=', $request->endDate);

        if(!is_null($request->projectId)){
            $totalTasks->where('project_id', $request->projectId);
        }

        $totalTasks = $totalTasks->count();

        $completedTasks = Task::where(DB::raw('DATE(`due_date`)'), '>=', $request->startDate)
            ->where(DB::raw('DATE(`due_date`)'), '<=', $request->endDate);

        if(!is_null($request->projectId)){
            $completedTasks->where('project_id', $request->projectId);
        }
        $completedTasks = $completedTasks->where('status', 'completed')->count();

        $pendingTasks = Task::where(DB::raw('DATE(`due_date`)'), '>=', $request->startDate)
            ->where(DB::raw('DATE(`due_date`)'), '<=', $request->endDate);

        if(!is_null($request->projectId)){
            $pendingTasks->where('project_id', $request->projectId);
        }

        $pendingTasks = $pendingTasks->where('status', 'incomplete')->count();

        return Reply::successWithData(__('messages.reportGenerated'),
            ['pendingTasks' => $pendingTasks, 'completedTasks' => $completedTasks, 'totalTasks' => $totalTasks]
        );
    }
}
