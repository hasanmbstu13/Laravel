<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Reply;
use App\Http\Requests\Payments\StorePayment;
use App\Http\Requests\Payments\UpdatePayments;
use App\Invoice;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class ManagePaymentsController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.payments');
        $this->pageIcon = 'fa fa-money';
    }

    public function index() {
        return view('admin.payments.index', $this->data);
    }

    public function data() {
        $payments = Payment::join('invoices', 'invoices.id', '=', 'payments.invoice_id')
            ->join('currencies', 'currencies.id', '=', 'invoices.currency_id')
            ->select('payments.id', 'payments.invoice_id', 'invoices.invoice_number', 'payments.amount', 'currencies.currency_symbol', 'payments.status', 'payments.paid_on')
            ->orderBy('payments.id', 'desc')
            ->get();

        return Datatables::of($payments)
            ->addColumn('action', function ($row) {
                return '<a href="' . route("admin.payments.edit", $row->id) . '" data-toggle="tooltip" data-original-title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a>
                        &nbsp;&nbsp;<a href="javascript:;" data-toggle="tooltip" data-original-title="Delete" data-payment-id="' . $row->id . '" class="btn btn-danger btn-circle sa-params"><i class="fa fa-times"></i></a>';
            })
            ->editColumn('invoice_number', function ($row) {
                return '<a href="' . route('admin.all-invoices.show', $row->invoice_id) . '">' . ucfirst($row->invoice_number) . '</a>';
            })
            ->editColumn('status', function ($row) {
                if($row->status == 'pending'){
                    return '<label class="label label-warning">'.strtoupper($row->status).'</label>';
                }else{
                    return '<label class="label label-success">'.strtoupper($row->status).'</label>';
                }
            })
            ->editColumn('amount', function ($row) {
                return $row->currency_symbol . $row->amount;
            })
            ->editColumn(
                'paid_on',
                function ($row) {
                    if(!is_null($row->paid_on)){
                        return $row->paid_on->timezone($this->global->timezone)->format('d M, Y');
                    }
                }
            )
            ->rawColumns(['action', 'status', 'invoice_number'])
            ->removeColumn('invoice_id')
            ->removeColumn('currency_symbol')
            ->make(true);
    }

    public function create(){
        $this->invoices = Invoice::all();
        return view('admin.payments.create', $this->data);
    }

    public function store(StorePayment $request){
        $invoice = Invoice::find($request->invoice_id);


        $payment = new Payment();
        $payment->invoice_id = $request->invoice_id;
        $payment->amount = $invoice->total;
        $payment->gateway = $request->gateway;
        $payment->transaction_id = $request->transaction_id;
        $payment->paid_on = Carbon::parse($request->paid_on)->format('Y-m-d');
        $payment->status = 'complete';
        $payment->save();

        //mark invoice paid or unpaid
        if($request->invoice_paid){
            $invoice->status = 'paid';
        }
        else{
            $invoice->status = 'unpaid';
        }
        $invoice->save();

        return Reply::redirect(route('admin.payments.index'), __('messages.paymentSuccess'));
    }

    public function destroy($id) {
        Payment::destroy($id);
        return Reply::success(__('messages.paymentDeleted'));
    }

    public function edit($id){
        $this->invoices = Invoice::all();
        $this->payment = Payment::find($id);
        return view('admin.payments.edit', $this->data);
    }

    public function update(UpdatePayments $request, $id){
        $invoice = Invoice::find($request->invoice_id);

        $payment = Payment::find($id);
        $payment->invoice_id = $request->invoice_id;
        $payment->amount = $invoice->total;
        $payment->gateway = $request->gateway;
        $payment->transaction_id = $request->transaction_id;
        if($request->status == 'pending'){
            $payment->paid_on = null;
        }
        else{
            $payment->paid_on = Carbon::parse($request->paid_on)->format('Y-m-d');
        }
        $payment->status = $request->status;
        $payment->save();

        //mark invoice paid or unpaid
        if($request->invoice_paid){
            $invoice->status = 'paid';
        }
        else{
            $invoice->status = 'unpaid';
        }
        $invoice->save();

        return Reply::redirect(route('admin.payments.index'), __('messages.paymentSuccess'));
    }

}
