<?php

namespace App\Http\Controllers\Client;

use App\Invoice;
use App\ModuleSetting;
use App\Project;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientProjectInvoicesController extends ClientBaseController
{

    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.projects');
        $this->pageIcon = 'icon-layers';

        if(!ModuleSetting::clientModule('projects')){
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
    public function store(Request $request)
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
        if($this->project->checkProjectClient()){
            return view('client.project-invoices.show', $this->data);
        }
        else{
            return redirect(route('client.dashboard.index'));
        }
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
        //
    }

    public function download($id) {

        $this->invoice = Invoice::find($id);
        $this->settings = Setting::find(1);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('client.project-invoices.invoice-pdf', $this->data);
        $filename = $this->invoice->invoice_number;
        return $pdf->download($filename . '.pdf');
    }
}
