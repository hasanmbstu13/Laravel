<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Helper\Reply;
use App\Invoice;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FinanceReportController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.financeReport');
        $this->pageIcon = 'ti-pie-chart';
    }

    public function index() {

        $this->currencies = Currency::all();
        $this->currentCurrencyId = $this->global->currency_id;

        $symbols = array();
        foreach($this->currencies as $currency){
            $symbols[] = $currency->currency_code;
        }
        $symbols = implode(',', $symbols);

        $client = new Client();
        $res = $client->request('GET', 'http://api.fixer.io/latest?base='.$this->global->currency->currency_code.'&symbols='.$symbols);

        $conversionRate = $res->getBody();
        $conversionRateArray = json_decode($conversionRate, true);

        $this->fromDate = Carbon::today()->subDays(30);
        $this->toDate = Carbon::today();
        $invoices = DB::table('invoices')
            ->join('currencies', 'currencies.id', '=', 'invoices.currency_id')
            ->where('issue_date', '>=', $this->fromDate)
            ->where('issue_date', '<=', $this->toDate)
            ->where('status', 'paid')
            ->groupBy('date')
            ->orderBy('issue_date', 'ASC')
            ->get([
                DB::raw('DATE_FORMAT(issue_date,\'%d/%M/%y\') as date'),
                DB::raw('sum(total) as total'),
                'currencies.currency_code'
            ]);

        $chartData = array();
        foreach($invoices as $chart) {
            if($chart->currency_code != $this->global->currency->currency_code){
                $chartData[] = ['date' => $chart->date, 'total' => floor($chart->total / $conversionRateArray['rates'][$chart->currency_code])];
            }
            else{
                $chartData[] = ['date' => $chart->date, 'total' => $chart->total];
            }
        }

        $this->chartData = json_encode($chartData);

        return view('admin.reports.finance.index', $this->data);
    }

    public function store(Request $request) {
        $this->currentCurrencyId = $request->currencyId;

        $currentCurrency = Currency::find($request->currencyId);

        $currencies = Currency::all();
        $symbols = array();
        foreach($currencies as $currency){
            $symbols[] = $currency->currency_code;
        }
        $symbols = implode(',', $symbols);

        $client = new Client();
        $res = $client->request('GET', 'http://api.fixer.io/latest?base='.$currentCurrency->currency_code.'&symbols='.$symbols);

        $conversionRate = $res->getBody();
        $conversionRateArray = json_decode($conversionRate, true);;

        $fromDate = $request->startDate;
        $toDate = $request->endDate;

        $invoices = DB::table('invoices')
            ->join('currencies', 'currencies.id', '=', 'invoices.currency_id')
            ->where('issue_date', '>=', $fromDate)
            ->where('issue_date', '<=', $toDate)
            ->where('status', 'paid')
            ->groupBy('date')
            ->orderBy('issue_date', 'ASC')
            ->get([
                DB::raw('DATE_FORMAT(issue_date,\'%d/%M/%y\') as date'),
                DB::raw('sum(total) as total'),
                'currencies.currency_code'
            ]);

        $chartData = array();
        foreach($invoices as $chart) {
            if($chart->currency_code != $currentCurrency->currency_code){
                $chartData[] = ['date' => $chart->date, 'total' => floor($chart->total / $conversionRateArray['rates'][$chart->currency_code])];
            }
            else{
                $chartData[] = ['date' => $chart->date, 'total' => $chart->total];
            }
        }

        $chartData = json_encode($chartData);

        return Reply::successWithData(__('messages.reportGenerated'), ['chartData' => $chartData]);
    }

}
