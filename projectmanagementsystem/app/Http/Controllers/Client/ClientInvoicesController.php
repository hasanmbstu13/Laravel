<?php

namespace App\Http\Controllers\Client;

use App\Invoice;
use App\InvoiceItems;
use App\ModuleSetting;
use App\PaymentGatewayCredentials;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class ClientInvoicesController extends ClientBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.invoices');
        $this->pageIcon = 'ti-receipt';

        if(!ModuleSetting::clientModule('invoices')){
            abort(403);
        }
    }

    public function index() {
        return view('client.invoices.index', $this->data);
    }

    public function create() {
        $invoices = Invoice::join('projects', 'projects.id', '=', 'invoices.project_id')
            ->join('currencies', 'currencies.id', '=', 'invoices.currency_id')
            ->select('invoices.id', 'projects.project_name', 'invoices.invoice_number', 'currencies.currency_symbol', 'invoices.total', 'invoices.issue_date', 'invoices.status')
            ->where('projects.client_id', $this->user->id);

        return Datatables::of($invoices)
            ->addColumn('action', function($row){
                return '<a href="'.route('client.invoices.download', $row->id).'" data-toggle="tooltip" data-original-title="Download" class="btn  btn-sm btn-outline btn-info"><i class="fa fa-download"></i> Download</a>';
            })
            ->editColumn('invoice_number', function($row){
                return '<a style="text-decoration: underline" href="'.route('client.invoices.show', $row->id).'">'.$row->invoice_number.'</a>';
            })
            ->editColumn('issue_date', function($row){
                return $row->issue_date->format('d M, Y');
            })
            ->editColumn('status', function ($row) {
                if($row->status == 'unpaid'){
                    return '<label class="label label-danger">'.strtoupper($row->status).'</label>';
                }else{
                    return '<label class="label label-success">'.strtoupper($row->status).'</label>';
                }
            })
            ->rawColumns(['action', 'status', 'invoice_number'])
            ->make(true);
    }

    public function download($id) {
        $this->invoice = Invoice::find($id);
        $this->discount = InvoiceItems::where('type', 'discount')
            ->where('invoice_id', $this->invoice->id)
            ->sum('amount');
        $this->taxes = InvoiceItems::where('type', 'tax')
            ->where('invoice_id', $this->invoice->id)
            ->get();

        $this->settings = Setting::find(1);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('client.invoices.invoice-pdf', $this->data);
        $filename = $this->invoice->invoice_number;
        return $pdf->download($filename . '.pdf');
    }

    public function show($id){
        $this->invoice = Invoice::find($id);
        $this->discount = InvoiceItems::where('type', 'discount')
            ->where('invoice_id', $this->invoice->id)
            ->sum('amount');
        $this->taxes = InvoiceItems::where('type', 'tax')
            ->where('invoice_id', $this->invoice->id)
            ->get();

        $this->settings = Setting::find(1);
        $this->credentials = PaymentGatewayCredentials::first();

        return view('client.invoices.show', $this->data);
    }
}
