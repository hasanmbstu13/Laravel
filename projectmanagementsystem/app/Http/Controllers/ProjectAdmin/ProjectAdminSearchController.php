<?php

namespace App\Http\Controllers\ProjectAdmin;

use App\UniversalSearch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectAdminSearchController extends ProjectAdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = 'Search results';
        $this->pageIcon = 'icon-magnifier';
    }

    public function store(Request $request) {
        $key = $request->search_key;

        if(trim($key) == ''){
            return redirect()->back();
        }

        return redirect(route('project-admin.search.show', $key));
    }

    public function show($key) {
        $this->searchResults = UniversalSearch::where('title', 'like', '%'.$key.'%')->get();
        $this->searchKey = $key;
        return view('project-admin.search.show', $this->data);
    }
}
