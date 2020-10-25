<?php

namespace App\Http\Controllers;

use App\Example;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
//    public function home(Example $example){
//        ddd($example);
//    }

    public function home() {
//        Both are same there is no significant between this, just personal preference
        return view('welcome');
//        return View::make('welcome');
//        ddd(resolve('App\Example'), resolve('App\Example'));
    }
}
