<?php

namespace App\Http\Controllers\Admin;

use App\ClientDetails;
use App\Currency;
use App\Estimate;
use App\EstimateItem;
use App\Helper\Reply;
use App\Http\Requests\StoreEstimate;
use App\Notifications\NewEstimate;
use App\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class ManageEstimatesController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.estimates');
        $this->pageIcon = 'ti-file';
    }

    public function index() {
        return view('admin.estimates.index', $this->data);
    }

    public function create() {
        $this->clients = ClientDetails::all();
        $this->currencies = Currency::all();
        return view('admin.estimates.create', $this->data);
    }

    public function store(StoreEstimate $request)
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
                return Reply::error(__('messages.amountNumber'));
            }
        }

        foreach ($items as $itm) {
            if (is_null($itm)) {
                return Reply::error(__('messages.itemBlank'));
            }
        }


        $estimate = new Estimate();
        $estimate->client_id = $request->client_id;
        $estimate->valid_till = Carbon::parse($request->valid_till)->format('Y-m-d');
        $estimate->sub_total = $request->sub_total;
        $estimate->total = $request->total;
        $estimate->currency_id = $request->currency_id;
        $estimate->note = $request->note;
        $estimate->status = 'waiting';
        $estimate->save();

        // Notify client
        $notifyUser = User::find($estimate->client_id);
        $notifyUser->notify(new NewEstimate($estimate));

        foreach ($items as $key => $item):
            if(!is_null($item)){
                EstimateItem::create(['estimate_id' => $estimate->id, 'item_name' => $item, 'type' => $type[$key], 'quantity' => $quantity[$key], 'unit_price' => $cost_per_item[$key], 'amount' => $amount[$key]]);
            }
        endforeach;

        return Reply::redirect(route('admin.estimates.edit', $estimate->id), __('messages.estimateCreated'));

    }

    public function edit($id) {
        $this->estimate = Estimate::find($id);
        $this->clients = ClientDetails::all();
        $this->currencies = Currency::all();
        return view('admin.estimates.edit', $this->data);
    }

    public function update(StoreEstimate $request, $id)
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
                return Reply::error(__('messages.amountNumber'));
            }
        }

        foreach ($items as $itm) {
            if (is_null($itm)) {
                return Reply::error(__('messages.itemBlank'));
            }
        }


        $estimate = Estimate::find($id);
        $estimate->client_id = $request->client_id;
        $estimate->valid_till = Carbon::parse($request->valid_till)->format('Y-m-d');
        $estimate->sub_total = $request->sub_total;
        $estimate->total = $request->total;
        $estimate->currency_id = $request->currency_id;
        $estimate->status = $request->status;
        $estimate->note = $request->note;
        $estimate->save();

        // Notify client
        $notifyUser = User::find($estimate->client_id);
        $notifyUser->notify(new NewEstimate($estimate));

        // delete and create new
        EstimateItem::where('estimate_id', $estimate->id)->delete();

        foreach ($items as $key => $item):
            EstimateItem::create(['estimate_id' => $estimate->id, 'item_name' => $item, 'type' => $type[$key], 'quantity' => $quantity[$key], 'unit_price' => $cost_per_item[$key], 'amount' => $amount[$key]]);
        endforeach;

        return Reply::success(__('messages.estimateUpdated'));

    }

    public function data() {
        $invoices = Estimate::join('users', 'estimates.client_id', '=', 'users.id')
            ->join('currencies', 'currencies.id', '=', 'estimates.currency_id')
            ->select('estimates.id', 'estimates.client_id', 'users.name', 'estimates.total', 'currencies.currency_symbol', 'estimates.status', 'estimates.valid_till')
            ->orderBy('estimates.id', 'desc')
            ->get();

        return Datatables::of($invoices)
            ->addColumn('action', function ($row) {
                return '<a href="' . route("admin.estimates.download", $row->id) . '" data-toggle="tooltip" data-original-title="Download" class="btn btn-inverse btn-circle"><i class="fa fa-download"></i></a>
                        &nbsp;&nbsp;<a href="' . route("admin.estimates.edit", $row->id) . '" data-toggle="tooltip" data-original-title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a>
                        &nbsp;&nbsp;<a href="javascript:;" data-toggle="tooltip" data-original-title="Delete" data-estimate-id="' . $row->id . '" class="btn btn-danger btn-circle sa-params"><i class="fa fa-times"></i></a>';
            })
            ->editColumn('name', function ($row) {
                return '<a href="' . route('admin.clients.projects', $row->client_id) . '">' . ucwords($row->name) . '</a>';
            })
            ->editColumn('status', function ($row) {
                if($row->status == 'waiting'){
                    return '<label class="label label-warning">'.strtoupper($row->status).'</label>';
                }
                if($row->status == 'declined'){
                    return '<label class="label label-danger">'.strtoupper($row->status).'</label>';
                }else{
                    return '<label class="label label-success">'.strtoupper($row->status).'</label>';
                }
            })
            ->editColumn('total', function ($row) {
                return $row->currency_symbol . $row->total;
            })
            ->editColumn(
                'valid_till',
                function ($row) {
                    return Carbon::parse($row->valid_till)->format('d F, Y');
                }
            )
            ->rawColumns(['name', 'action', 'status'])
            ->removeColumn('currency_symbol')
            ->removeColumn('client_id')
            ->make(true);
    }

    public function destroy($id) {
        Estimate::destroy($id);
        return Reply::success(__('messages.estimateDeleted'));
    }


    public function download($id) {
//        header('Content-type: application/pdf');

        $this->estimate = Estimate::find($id);
        $this->discount = EstimateItem::where('type', 'discount')
            ->where('estimate_id', $this->estimate->id)
            ->sum('amount');
        $this->taxes = EstimateItem::where('type', 'tax')
            ->where('estimate_id', $this->estimate->id)
            ->get();

//        return $this->invoice->project->client->client[0]->address;
        $this->settings = Setting::find(1);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.estimates.estimate-pdf', $this->data);
        $filename = 'estimate-'.$this->estimate->id;
//        return $pdf->stream();
        return $pdf->download($filename . '.pdf');
    }

}
