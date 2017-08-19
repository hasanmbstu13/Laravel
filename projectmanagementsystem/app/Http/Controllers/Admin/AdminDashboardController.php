<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Issue;
use App\ProjectActivity;
use App\Task;
use App\User;
use App\UserActivity;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.dashboard');
        $this->pageIcon = 'icon-speedometer';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->counts = DB::table('users')
            ->select(
                DB::raw('(select count(users.id) from `users` inner join role_user on role_user.user_id=users.id inner join roles on roles.id=role_user.role_id WHERE roles.name = "client") as totalClients'),
                DB::raw('(select count(users.id) from `users` inner join role_user on role_user.user_id=users.id inner join roles on roles.id=role_user.role_id WHERE roles.name = "employee") as totalEmployees'),
                DB::raw('(select count(projects.id) from `projects`) as totalProjects'),
                DB::raw('(select count(invoices.id) from `invoices` where status = "paid") as totalPaidInvoices'),
                DB::raw('(select sum(project_time_logs.total_hours) from `project_time_logs`) as totalHoursLogged'),
                DB::raw('(select count(tasks.id) from `tasks` where status="completed" and DATE(due_date) <= CURDATE()) as totalCompletedTasks'),
                DB::raw('(select count(tasks.id) from `tasks` where status="incomplete" and DATE(due_date) <= CURDATE()) as totalPendingTasks'),
                DB::raw('(select count(issues.id) from `issues` where status="pending") as totalPendingIssues')
            )
            ->first();

        $this->pendingTasks = Task::where('status', 'incomplete')
            ->where(DB::raw('DATE(due_date)'), '<=', Carbon::today()->format('Y-m-d'))
            ->get();

        $this->pendingIssues = Issue::where('status', 'pending')->get();

        $this->projectActivities = ProjectActivity::limit(15)->orderBy('id', 'desc')->get();
        $this->userActivities = UserActivity::limit(15)->orderBy('id', 'desc')->get();


        // earning chart
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

        $this->fromDate = Carbon::today()->subDays(180);
        $this->toDate = Carbon::today();
        $invoices = DB::table('payments')
            ->join('invoices', 'invoices.id', '=', 'payments.invoice_id')
            ->join('currencies', 'currencies.id', '=', 'invoices.currency_id')
            ->where('paid_on', '>=', $this->fromDate)
            ->where('paid_on', '<=', $this->toDate)
            ->where('payments.status', 'complete')
            ->groupBy('paid_on')
            ->orderBy('paid_on', 'ASC')
            ->get([
                DB::raw('DATE_FORMAT(paid_on,"%Y-%m-%d") as date'),
                DB::raw('sum(amount) as total'),
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

        return view('admin.dashboard.index', $this->data);
    }
}
