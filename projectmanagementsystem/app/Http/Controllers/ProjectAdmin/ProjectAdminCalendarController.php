<?php

namespace App\Http\Controllers\ProjectAdmin;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectAdminCalendarController extends ProjectAdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.taskCalendar');
        $this->pageIcon = 'icon-calender';
    }

    public function index() {
        $this->tasks = Task::where('status', 'incomplete')->get();
        return view('project-admin.task-calendar.index', $this->data);
    }

    public function show($id) {
        $this->task = Task::find($id);
        return view('project-admin.task-calendar.show', $this->data);
    }
}
