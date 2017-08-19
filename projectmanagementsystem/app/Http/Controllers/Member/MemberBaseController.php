<?php

namespace App\Http\Controllers\Member;

use App\ModuleSetting;
use App\ProjectActivity;
use App\ProjectTimeLog;
use App\Setting;
use App\UserActivity;
use App\UserChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use App\ThemeSetting;

class MemberBaseController extends Controller
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
        $this->employeeTheme = ThemeSetting::where('panel', 'employee')->first();

        App::setLocale($this->global->locale);


        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            $this->notifications = $this->user->notifications;
            $this->timer = ProjectTimeLog::memberActiveTimer($this->user->id);
            $this->unreadMessageCount = UserChat::where('to', $this->user->id)->where('message_seen', 'no')->count();
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
