<?php
namespace Modules\Report\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Booking\Models\RequestQuote;

class RequestQuoteController extends AdminController
{
    protected $requestQuoteClass;

    public function __construct()
    {
        $this->setActiveMenu('admin/module/report/booking');
        parent::__construct();
        $this->requestQuoteClass = RequestQuote::class;

    }

    public function index(Request $request)
    {
        $this->checkPermission('enquiry_view');
        $query = $this->requestQuoteClass::where('status', '!=', 'draft');
        if (!empty($request->s)) {
            $query->where('email', 'LIKE', '%' . $request->s . '%');
            $query->orderBy('email', 'asc');
            $title_page = __('Search results: ":s"', ["s" => $request->s]);
        }
        $query->whereIn('object_model', array_keys(get_bookable_services()));
        $query->orderBy('id','desc');
        $data = [
            'rows'                  => $query->paginate(20),
            'breadcrumbs' => [
                [
                    'name' => __('Enquiry'),
                    'url'  => 'admin/module/report/request_quote'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            'request_quote_update'        => $this->hasPermission('request_quote_update'),
            'request_quote_manage_others' => $this->hasPermission('request_quote_manage_others'),
            'statues'        => $this->requestQuoteClass::$requestQuoteStatus,
            'page_title'=> $title_page ?? __("Request Quote Management")
        ];

        return view('Report::admin.requestquote.index', $data);
    }

    public function bulkEdit(Request $request)
    {
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select action'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = $this->requestQuoteClass::where("id", $id);
                if (!$this->hasPermission('request_quote_manage_others')) {
                    $query->where("vendor_id", Auth::id());
                    $this->checkPermission('request_quote_update');
                }
                $query->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        } else {
            foreach ($ids as $id) {
                $query = $this->requestQuoteClass::where("id", $id);
                if (!$this->hasPermission('request_quote_manage_others')) {
                    $query->where("vendor_id", Auth::id());
                    $this->checkPermission('request_quote_update');
                }
                $item = $query->first();
                if(!empty($item)){
                    $item->status = $action;
                    $item->save();
                }
            }
        }
        return redirect()->back()->with('success', __('Update success'));
    }

    public function store(Request $request, $id)
    {
        if($id and $id>0){
            $this->checkPermission('request_quote_update');
            $row = $this->requestQuoteClass::find($id);
            if(empty($row)){
                abort(404);
            }
            if ($row->id != Auth::user()->id and !Auth::user()->hasPermissionTo('request_quote_update')) {
                abort(403);
            }

            $request->validate([
                'name'              => 'required|max:255',
                'price'              => 'numeric',
                'phone'              => 'required',
                'email'              =>[
                    'required',
                    'email',
                    'max:255'
                ]
            ]);

        }

        $row->name = $request->input('name');
        $row->phone = $request->input('phone');
        $row->email = $request->input('email');
        $row->note = $request->input('note');
        $row->price = $request->input('price');

        if ($row->save()) {
            return back()->with('success', __('Request quote updated'));
        }
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('request_quote_update');
        $row = $this->requestQuoteClass::find($id);
        if (empty($row)) {
            return redirect(route('vendor.request_quote_report'));
        }
//        $translation = $row->translateOrOrigin($request->query('lang'));
//        if (!$this->hasPermission('request_quote_manage_others')) {
//            if ($row->create_user != Auth::id()) {
//                return redirect(route('vendor.request_quote_report'));
//            }
//        }
        $data = [
            'row'            => $row,
//            'translation'    => $translation,
            'enable_multi_lang'=>true,
            'breadcrumbs'    => [
                [
                    'name' => __('RequestQuote'),
                    'url'  => 'admin/module/request-quote-report'
                ],
                [
                    'name'  => __('Edit Request Quote'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>'Edit Request quote'
        ];
        return view('Report::admin.request-quote.detail', $data);
    }

}
