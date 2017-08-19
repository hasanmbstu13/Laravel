<?php

namespace App\Http\Controllers\ProjectAdmin;

use App\Currency;
use App\Issue;
use App\ProjectActivity;
use App\Task;
use App\User;
use App\UserActivity;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectAdminDashboardController extends ProjectAdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.dashboard');
        $this->pageIcon = 'icon-speedometer';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->counts = DB::table('users')
            ->select(
                DB::raw('(select count(projects.id) from `projects`) as totalProjects'),
                DB::raw('(select count(tasks.id) from `tasks` where status="completed" and DATE(due_date) <= CURDATE()) as totalCompletedTasks'),
                DB::raw('(select count(tasks.id) from `tasks` where status="incomplete" and DATE(due_date) <= CURDATE()) as totalPendingTasks'),
                DB::raw('(select count(issues.id) from `issues` where status="pending") as totalPendingIssues')
            )
            ->first();

        $this->pendingTasks = Task::where('status', 'incomplete')
            ->where(DB::raw('DATE(due_date)'), '<=', Carbon::today()->format('Y-m-d'))
            ->get();

        $this->pendingIssues = Issue::where('status', 'pending')->get();

        $this->projectActivities = ProjectActivity::limit(15)->orderBy('id', 'desc')->get();
        $this->userActivities = UserActivity::limit(15)->orderBy('id', 'desc')->get();

        return view('project-admin.dashboard.index', $this->data);
    }
}
