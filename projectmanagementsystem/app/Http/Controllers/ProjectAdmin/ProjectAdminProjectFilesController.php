<?php

namespace App\Http\Controllers\ProjectAdmin;

use App\Helper\Reply;
use App\Project;
use App\ProjectFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectAdminProjectFilesController extends ProjectAdminBaseController
{

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
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = new ProjectFile();
            $file->user_id = $this->user->id;
            $file->project_id = $request->project_id;

            $request->file->store('public/project-files/'.$request->project_id);
            $file->filename = $request->file->getClientOriginalName();
            $file->hashname = $request->file->hashName();

            $file->size = $request->file->getSize();
            $file->save();
            $this->logProjectActivity($request->project_id, __('messages.newFileUploadedToTheProject'));
        }

        $this->project = Project::find($request->project_id);
        $view = view('project-admin.projects.project-files.ajax-list', $this->data)->render();
        return Reply::successWithData(__('messages.fileUploaded'), ['html' => $view]);
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
        return view('project-admin.projects.project-files.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $file = ProjectFile::find($id);
        File::delete('storage/project-files/'.$file->project_id.'/'.$file->hashname);
        ProjectFile::destroy($id);
        $this->project = Project::find($file->project_id);
        $view = view('project-admin.projects.project-files.ajax-list', $this->data)->render();
        return Reply::successWithData(__('messages.fileDeleted'), ['html' => $view]);
    }

    public function download($id) {
        $file = ProjectFile::find($id);
        return response()->download('storage/project-files/'.$file->project_id.'/'.$file->hashname);
    }
}
