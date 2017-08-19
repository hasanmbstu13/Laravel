<?php

namespace App\Http\Controllers\ProjectAdmin;

use App\Helper\Reply;
use App\Issue;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectAdminIssuesController extends ProjectAdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = "Project";
        $this->pageIcon = "layers";
    }

    public function show($id) {
        $this->project = Project::find($id);
        return view('project-admin.projects.issues.show', $this->data);
    }

    public function update(Request $request, $id) {
        $issue = Issue::find($id);
        $issue->status = $request->status;
        $issue->save();

        $this->project = Project::find($issue->project_id);
        $view = view('project-admin.projects.issues.ajax-list', $this->data)->render();

        return Reply::successWithData(__('messages.issueStatusChanged'), ['html' => $view]);
    }
}
