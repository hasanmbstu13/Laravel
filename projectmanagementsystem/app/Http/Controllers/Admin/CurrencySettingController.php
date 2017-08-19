<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Helper\Reply;
use App\Http\Requests\Currency\StoreCurrency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencySettingController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageIcon = 'icon-settings';
        $this->pageTitle = __('app.menu.currencySettings');
    }

    public function index() {
        $this->currencies = Currency::all();
        return view('admin.currencies.index', $this->data);
    }

    public function create() {
        return view('admin.currencies.create', $this->data);
    }

    public function edit($id) {
        $this->currency = Currency::find($id);
        return view('admin.currencies.edit', $this->data);
    }

    public function store(StoreCurrency $request) {

        $currency = new Currency();
        $currency->currency_name = $request->currency_name;
        $currency->currency_symbol = $request->currency_symbol;
        $currency->currency_code = $request->currency_code;
        $currency->save();

        return Reply::redirect(route('admin.currency.edit', $currency->id), __('messages.currencyAdded'));
    }

    public function update(StoreCurrency $request, $id) {
        $currency = Currency::find($id);
        $currency->currency_name = $request->currency_name;
        $currency->currency_symbol = $request->currency_symbol;
        $currency->currency_code = $request->currency_code;
        $currency->save();

        return Reply::success(__('messages.currencyUpdated'));
    }

    public function destroy($id) {
        Currency::destroy($id);
        return Reply::success(__('messages.currencyDeleted'));
    }
}
