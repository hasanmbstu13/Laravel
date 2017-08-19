<?php

namespace App\Http\Controllers\Client;

use App\ProjectActivity;
use App\Setting;
use App\UserActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ThemeSetting;

class ClientBaseController extends Controller
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
        $this->companyName = $this->global->company_name;
        $this->clientTheme = ThemeSetting::where('panel', 'client')->first();

        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            $this->notifications = $this->user->notifications;
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

}
