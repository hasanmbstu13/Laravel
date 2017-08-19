<?php

namespace App\Http\Controllers\Member;

use App\ModuleSetting;
use App\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberNoticesController extends MemberBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.noticeBoard');
        $this->pageIcon = 'ti-layout-media-overlay';

        if(!ModuleSetting::employeeModule('notices')){
            abort(403);
        }
    }

    public function index() {
        $this->notices = Notice::orderBy('id', 'desc')->limit(10)->get();
        return view('member.notices.index', $this->data);
    }
}
