<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\Datatables\Facades\Datatables;

class ManageAllInvoicesController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.invoices');
        $this->pageIcon = 'ti-receipt';
    }

    public function index() {
        return view('admin.invoices.index', $this->data);
    }

    public function data() {
        $invoices = Invoice::join('projects', 'projects.id', '=', 'invoices.project_id')
            ->join('currencies', 'currencies.id', '=', 'invoices.currency_id')
            ->select('invoices.id', 'invoices.project_id', 'invoices.invoice_number', 'projects.project_name', 'invoices.total', 'currencies.currency_symbol', 'invoices.status', 'invoices.issue_date')
            ->orderBy('invoices.id', 'desc')
            ->get();

        return Datatables::of($invoices)
            ->addColumn('action', function ($row) {
                return '<a href="' . route("admin.all-invoices.download", $row->id) . '" data-toggle="tooltip" data-original-title="Download" class="btn btn-inverse btn-circle"><i class="fa fa-download"></i></a>
                        &nbsp;&nbsp;<a href="' . route("admin.all-invoices.edit", $row->id) . '" data-toggle="tooltip" data-original-title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a>
                        &nbsp;&nbsp;<a href="javascript:;" data-toggle="tooltip" data-original-title="Delete" data-invoice-id="' . $row->id . '" class="btn btn-danger btn-circle sa-params"><i class="fa fa-times"></i></a>';
            })
            ->editColumn('project_name', function ($row) {
                return '<a href="' . route('admin.projects.show', $row->project_id) . '">' . ucfirst($row->project_name) . '</a>';
            })
            ->editColumn('invoice_number', function ($row) {
                return '<a href="' . route('admin.all-invoices.show', $row->id) . '">' . ucfirst($row->invoice_number) . '</a>';
            })
            ->editColumn('status', function ($row) {
                if($row->status == 'unpaid'){
                    return '<label class="label label-danger">'.strtoupper($row->status).'</label>';
                }else{
                    return '<label class="label label-success">'.strtoupper($row->status).'</label>';
                }
            })
            ->editColumn('total', function ($row) {
                return $row->currency_symbol . $row->total;
            })
            ->editColumn(
                'issue_date',
                function ($row) {
                    return $row->issue_date->timezone($this->global->timezone)->format('d F, Y');
                }
            )
            ->rawColumns(['project_name', 'action', 'status', 'invoice_number'])
            ->removeColumn('currency_symbol')
            ->removeColumn('project_id')
            ->make(true);
    }

    public function download($id) {
//        header('Content-type: application/pdf');

        $this->invoice = Invoice::find($id);
        $this->discount = InvoiceItems::where('type', 'discount')
                            ->where('invoice_id', $this->invoice->id)
                            ->sum('amount');
        $this->taxes = InvoiceItems::where('type', 'tax')
                            ->where('invoice_id', $this->invoice->id)
                            ->get();

//        return $this->invoice->project->client->client[0]->address;
        $this->settings = Setting::find(1);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.invoices.invoice-pdf', $this->data);
        $filename = $this->invoice->invoice_number;
//        return $pdf->stream();
        return $pdf->download($filename . '.pdf');
    }

    public function destroy($id) {
        Invoice::destroy($id);
        return Reply::success(__('messages.invoiceDeleted'));
    }

    public function create() {
        $this->projects = Project::all();
        $this->currencies = Currency::all();
        return view('admin.invoices.create', $this->data);
    }

    public function store(StoreInvoice $request)
    {
        $items = $request->input('item_name');
        $cost_per_item = $request->input('cost_per_item');
        $quantity = $request->input('quantity');
        $amount = $request->input('amount');
        $type = $request->input('type');

        if (trim($items[0]) == '' || trim($items[0]) == '' || trim($cost_per_item[0]) == '') {
            return Reply::error(__('messages.addItem'));
        }

        foreach ($quantity as $qty) {
            if (!is_numeric($qty) && (intval($qty) < 1)) {
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
                return Reply::error(__('messages.amountNumber'));
            }
        }

        foreach ($items as $itm) {
            if (is_null($itm)) {
                return Reply::error(__('messages.itemBlank'));
            }
        }


        $invoice = new Invoice();
        $invoice->project_id = $request->project_id;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->issue_date = Carbon::parse($request->issue_date)->format('Y-m-d');
        $invoice->due_date = Carbon::parse($request->due_date)->format('Y-m-d');
        $invoice->sub_total = $request->sub_total;
        $invoice->total = $request->total;
        $invoice->currency_id = $request->currency_id;
        $invoice->save();

        // Notify client
        $notifyUser = User::find($invoice->project->client_id);
        $notifyUser->notify(new NewInvoice($invoice));

        foreach ($items as $key => $item):
            if(!is_null($item)){
                InvoiceItems::create(['invoice_id' => $invoice->id, 'item_name' => $item, 'type' => $type[$key], 'quantity' => $quantity[$key], 'unit_price' => $cost_per_item[$key], 'amount' => $amount[$key]]);
            }
        endforeach;

        return Reply::redirect(route('admin.all-invoices.edit', $invoice->id), __('messages.invoiceCreated'));

    }

    public function edit($id) {
        $this->invoice = Invoice::find($id);
        $this->projects = Project::all();
        $this->currencies = Currency::all();
        return view('admin.invoices.edit', $this->data);
    }

    public function update(StoreInvoice $request, $id)
    {
        $items = $request->input('item_name');
        $cost_per_item = $request->input('cost_per_item');
        $quantity = $request->input('quantity');
        $amount = $request->input('amount');
        $type = $request->input('type');

        if (trim($items[0]) == '' || trim($items[0]) == '' || trim($cost_per_item[0]) == '') {
            return Reply::error('Add at-least 1 item.');
        }

        foreach ($quantity as $qty) {
            if (!is_numeric($qty) && $qty < 1) {
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
                return Reply::error(__('messages.amountNumber'));
            }
        }

        foreach ($items as $itm) {
            if (is_null($itm)) {
                return Reply::error(__('messages.itemBlank'));
            }
        }


        $invoice = Invoice::find($id);
        $invoice->project_id = $request->project_id;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->issue_date = Carbon::parse($request->issue_date)->format('Y-m-d');
        $invoice->due_date = Carbon::parse($request->due_date)->format('Y-m-d');
        $invoice->sub_total = $request->sub_total;
        $invoice->total = $request->total;
        $invoice->currency_id = $request->currency_id;
        $invoice->status = $request->status;
        $invoice->save();

        // Notify client
        $notifyUser = User::find($invoice->project->client_id);
        $notifyUser->notify(new NewInvoice($invoice));

        // delete and create new
        InvoiceItems::where('invoice_id', $invoice->id)->delete();

        foreach ($items as $key => $item):
            InvoiceItems::create(['invoice_id' => $invoice->id, 'item_name' => $item, 'type' => $type[$key], 'quantity' => $quantity[$key], 'unit_price' => $cost_per_item[$key], 'amount' => $amount[$key]]);
        endforeach;

        return Reply::success(__('messages.invoiceUpdated'));

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

        return view('admin.invoices.show', $this->data);
    }


}
