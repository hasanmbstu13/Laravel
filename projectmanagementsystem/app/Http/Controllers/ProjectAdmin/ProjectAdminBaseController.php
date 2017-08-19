<?php

namespace App\Http\Controllers\ProjectAdmin;

use App\EmailNotificationSetting;
use App\ProjectActivity;
use App\Setting;
use App\UniversalSearch;
use App\UserActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use App\ThemeSetting;


class ProjectAdminBaseController extends Controller
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[ $name ]);
    }

    /**
     * UserBaseController constructor.
     */
    public function __construct()
    {
        // Inject currently logged in user object into every view of user dashboard

        $this->global = Setting::first();
        $this->emailSetting = EmailNotificationSetting::all();
        $this->companyName = $this->global->company_name;

        App::setLocale($this->global->locale);

        $this->projectAdminTheme = ThemeSetting::where('panel', 'project_admin')->first();

        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });


    }

    public function logProjectActivity($projectId, $text) {
        $activity = new ProjectActivity();
        $activity->project_id = $projectId;
        $activity->activity = $text;
        $activity->save();
    }

    public function logUserActivity($userId, $text) {
        $activity = new UserActivity();
        $activity->user_id = $userId;
        $activity->activity = $text;
        $activity->save();
    }

    public function logSearchEntry($searchableId, $title, $route) {
        $search = new UniversalSearch();
        $search->searchable_id = $searchableId;
        $search->title = $title;
        $search->route_name = $route;
        $search->save();
    }
}
