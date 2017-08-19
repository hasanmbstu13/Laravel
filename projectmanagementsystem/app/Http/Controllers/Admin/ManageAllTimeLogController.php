<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Reply;
use App\Project;
use App\ProjectTimeLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class ManageAllTimeLogController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = 'Time Logs';
        $this->pageIcon = 'icon-clock';
    }

    public function index(){
        $this->projects = Project::all();
        return view('admin.time-logs.index', $this->data);
    }

    public function data($startDate = null, $endDate = null, $projectId = null) {
        $timeLogs = ProjectTimeLog::join('projects', 'projects.id', '=', 'project_time_logs.project_id')
            ->select('project_time_logs.id', 'projects.project_name', 'project_time_logs.start_time', 'project_time_logs.end_time', 'project_time_logs.total_hours', 'project_time_logs.memo', 'project_time_logs.project_id');

        if(!is_null($startDate)){
            $timeLogs->where(DB::raw('DATE(project_time_logs.`start_time`)'), '>=', $startDate);
        }

        if(!is_null($endDate)){
            $timeLogs->where(DB::raw('DATE(project_time_logs.`end_time`)'), '<=', $endDate);
        }

        if($projectId != 0){
            $timeLogs->where('project_time_logs.project_id', '=', $projectId);
        }

        $timeLogs->get();

        return Datatables::of($timeLogs)
            ->addColumn('action', function($row){
                return '<a href="javascript:;" class="btn btn-danger btn-circle sa-params"
                      data-toggle="tooltip" data-time-id="'.$row->id.'" data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>';
            })
            ->editColumn('start_time', function($row){
                return $row->start_time->timezone($this->global->timezone)->format('d M, Y h:i A');
            })
            ->editColumn('end_time', function($row){
                if(!is_null($row->end_time)){
                    return $row->end_time->timezone($this->global->timezone)->format('d M, Y h:i A');
                }
                else{
                    return "<label class='label label-success'>".__('app.active')."</label>";
                }
            })
            ->editColumn('project_name', function ($row) {
                return '<a href="' . route('admin.projects.show', $row->project_id) . '">' . ucfirst($row->project_name) . '</a>';
            })
            ->rawColumns(['end_time', 'action', 'project_name'])
            ->removeColumn('project_id')
            ->make(true);
    }

    public function destroy($id) {
        ProjectTimeLog::destroy($id);
        return Reply::success(__('messages.timeLogDeleted'));
    }


}
