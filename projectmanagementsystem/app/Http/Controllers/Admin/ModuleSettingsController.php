<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Reply;
use App\ModuleSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleSettingsController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.moduleSettings');
        $this->pageIcon = 'icon-settings';
    }

    public function index() {
        $this->employeeModules = ModuleSetting::where('type', 'employee')->get();
        $this->clientModules = ModuleSetting::where('type', 'client')->get();
        return view('admin.module-settings.index', $this->data);
    }

    public function update(Request $request){
        $setting = ModuleSetting::find($request->id);
        $setting->status = $request->status;
        $setting->save();

        return Reply::success(__('messages.settingsUpdated'));
    }
}
