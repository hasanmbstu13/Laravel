<?php

namespace App\Http\Controllers\ProjectAdmin;

use App\Currency;
use App\Helper\Reply;
use App\Http\Requests\Invoices\StoreInvoice;
use App\Invoice;
use App\InvoiceItems;
use App\Notifications\NewInvoice;
use App\Project;
use App\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectAdminInvoicesController extends ProjectAdminBaseController
{

    public function __construct() {
        parent::__construct();
        $this->pageTitle = 'Project';
        $this->pageIcon = 'layers';
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
        $this->project = Project::find();
        return view('project-admin.projects.invoices.create', $this->data);
    }

    public function createInvoice(Request $request)
    {
        $this->project = Project::find($request->id);
        $this->currencies = Currency::all();
        return view('project-admin.projects.invoices.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoice $request)
    {
        $items = $request->input('item_name');
        $cost_per_item = $request->input('cost_per_item');
        $quantity = $request->input('quantity');
        $amount = $request->input('amount');

        if (trim($items[0]) == '' || trim($items[0]) == '' || trim($cost_per_item[0]) == '') {
            return Reply::error('Add at-least 1 item.');
        }

        foreach ($quantity as $qty) {
            if (!is_numeric($qty)) {
                return Reply::error(__('messages.quantityNumber'));
            }
        }

        foreach ($cost_per_item as $rate) {
            if (!is_numeric($rate)) {
                return Reply::error(__('messages.unitPriceNumber'));
            }
        }

        foreach ($amount as $amt) {
            if (!is_numeric($amt)) {
                return Reply::error('Amount should be a number.');
            }
        }

        foreach ($items as $itm) {
            if (is_null($itm)) {
                return Reply::error('Item name cannot be blank.');
            }
        }


        $invoice = new Invoice();
        $invoice->project_id = $request->project_id;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->issue_date = Carbon::parse($request->issue_date)->format('Y-m-d');
        $invoice->due_date = Carbon::parse($request->due_date)->format('Y-m-d');
        $invoice->tax_percent = $request->tax_percent;
        $invoice->sub_total = $request->sub_total;
        $invoice->discount = $request->discount;
        $invoice->total = $request->total;
        $invoice->currency_id = $request->currency_id;
        $invoice->save();

        // Notify client
        $notifyUser = User::find($invoice->project->client_id);
        $notifyUser->notify(new NewInvoice($invoice));

        foreach ($items as $key => $item):
            InvoiceItems::create(['invoice_id' => $invoice->id, 'item_name' => $item, 'quantity' => $quantity[$key], 'unit_price' => $cost_per_item[$key], 'amount' => $amount[$key]]);
        endforeach;

        $this->project = Project::find($request->project_id);
        $view = view('project-admin.projects.invoices.invoice-ajax', $this->data)->render();
        return Reply::successWithData(__('messages.invoiceCreated'), ['html' => $view]);

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
        return view('project-admin.projects.invoices.show', $this->data);
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
        $invoice = Invoice::find($id);
        Invoice::destroy($id);
        $this->project = Project::find($invoice->project_id);
        $view = view('project-admin.projects.invoices.invoice-ajax', $this->data)->render();
        return Reply::successWithData(__('messages.invoiceDeleted'), ['html' => $view]);
    }

    public function download($id) {
//        header('Content-type: application/pdf');

        $this->invoice = Invoice::find($id);
//        return $this->invoice->project->client->client[0]->address;
        $this->settings = Setting::find(1);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('project-admin.projects.invoices.invoice-pdf', $this->data);
        $filename = $this->invoice->invoice_number;
//        return $pdf->stream();
        return $pdf->download($filename . '.pdf');
    }
}
