<?php

namespace App\Providers;

use App\Example;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        app()->bind('App\Example', function(){
//        $this->app->bind('App\Example', function(){
////        $this->app->singleton('App\Example', function(){
//            $collaborator = new \App\Collaborator();
//            $foo = 'foobar';
//
//            return new \App\Example($collaborator, $foo);
//        });

        $this->app->bind('example', function () {
            return new Example();
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
