<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Reply;
use App\Http\Requests\TimeLogs\StoreTimeLog;
use App\Project;
use App\ProjectTimeLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class ManageTimeLogsController extends AdminBaseController
{

    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.projects');
        $this->pageIcon = 'icon=layers';
    }

    public function show($id) {
        $this->project = Project::find($id);
        return view('admin.projects.time-logs.show', $this->data);
    }

    public function store(StoreTimeLog $request) {
        $timeLog = new ProjectTimeLog();
        $timeLog->project_id = $request->project_id;
        $timeLog->user_id = $request->user_id;
        $timeLog->start_time = Carbon::parse($request->start_date)->format('Y-m-d').' '.Carbon::parse($request->start_time)->format('H:i:s');
        $timeLog->start_time = Carbon::createFromFormat('Y-m-d H:i:s', $timeLog->start_time, $this->global->timezone)->setTimezone('UTC');
        $timeLog->end_time = Carbon::parse($request->end_date)->format('Y-m-d').' '.Carbon::parse($request->end_time)->format('H:i:s');
        $timeLog->end_time = Carbon::createFromFormat('Y-m-d H:i:s', $timeLog->end_time, $this->global->timezone)->setTimezone('UTC');
        $timeLog->total_hours = $timeLog->end_time->diff($timeLog->start_time)->format('%d')*24+$timeLog->end_time->diff($timeLog->start_time)->format('%H');

        if($timeLog->total_hours == 0){
            $timeLog->total_hours = round(($timeLog->end_time->diff($timeLog->start_time)->format('%i')/60),2);
        }
        
        $timeLog->memo = $request->memo;
        $timeLog->edited_by_user = $this->user->id;
        $timeLog->save();

        return Reply::success(__('messages.timeLogAdded'));
    }

    public function data($id) {
        $timeLogs = ProjectTimeLog::where('project_id', $id)->get();

        return Datatables::of($timeLogs)
            ->addColumn('action', function($row){
            return '<a href="javascript:;" class="btn btn-info btn-circle edit-time-log"
                      data-toggle="tooltip" data-time-id="'.$row->id.'"  data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                    <a href="javascript:;" class="btn btn-danger btn-circle sa-params"
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
            ->editColumn('user_id', function($row){
                return ucwords($row->user->name);
            })
            ->editColumn('edited_by_user', function($row){
                if(!is_null($row->edited_by_user)){
                    return ucwords($row->editor->name);
                }
            })
            ->rawColumns(['end_time', 'action'])
            ->removeColumn('project_id')
            ->make(true);
    }

    public function destroy($id) {
        ProjectTimeLog::destroy($id);
        return Reply::success(__('messages.timeLogDeleted'));
    }

    public function edit($id) {
        $this->timeLog = ProjectTimeLog::find($id);
        $this->project = Project::find($this->timeLog->project_id);
        return view('admin.projects.time-logs.edit', $this->data);
    }

    public function update(StoreTimeLog $request, $id) {
        $timeLog = ProjectTimeLog::find($id);
        $timeLog->user_id = $request->user_id;
        $timeLog->start_time = Carbon::parse($request->start_date)->format('Y-m-d').' '.Carbon::parse($request->start_time)->format('H:i:s');
        $timeLog->start_time = Carbon::createFromFormat('Y-m-d H:i:s', $timeLog->start_time, $this->global->timezone)->setTimezone('UTC');
        $timeLog->end_time = Carbon::parse($request->end_date)->format('Y-m-d').' '.Carbon::parse($request->end_time)->format('H:i:s');
        $timeLog->end_time = Carbon::createFromFormat('Y-m-d H:i:s', $timeLog->end_time, $this->global->timezone)->setTimezone('UTC');
        $timeLog->total_hours = $timeLog->end_time->diff($timeLog->start_time)->format('%d')*24+$timeLog->end_time->diff($timeLog->start_time)->format('%H');

        if($timeLog->total_hours == 0){
            $timeLog->total_hours = round(($timeLog->end_time->diff($timeLog->start_time)->format('%i')/60),2);
        }

        $timeLog->memo = $request->memo;
        $timeLog->edited_by_user = $this->user->id;
        $timeLog->save();

        return Reply::success(__('messages.timeLogUpdated'));
    }

    public function stopTimer(Request $request){
        $timeId = $request->timeId;
        $timeLog = ProjectTimeLog::find($timeId);
        $timeLog->end_time = Carbon::now();
        $timeLog->edited_by_user = $this->user->id;
        $timeLog->save();

        $timeLog->total_hours = ($timeLog->end_time->diff($timeLog->start_time)->format('%d')*24)+($timeLog->end_time->diff($timeLog->start_time)->format('%H'));

        if($timeLog->total_hours == 0){
            $timeLog->total_hours = round(($timeLog->end_time->diff($timeLog->start_time)->format('%i')/60),2);
        }

        $timeLog->save();

        $this->activeTimers = ProjectTimeLog::projectActiveTimers($timeLog->project_id);
        $view = view('admin.projects.time-logs.active-timers', $this->data)->render();
        return Reply::successWithData(__('messages.timerStoppedSuccessfully'), ['html' => $view]);
    }

}