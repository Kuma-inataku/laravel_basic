<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MySeviceProvider extends ServiceProvider
{
    public function register()
    {
        app()->singleton('App\MyClasses\MyServiceInterface',
            'App\MyClasses\PowerMyService');
        echo "<b>＜MyServiceProvider/register＞</b><br>";
    }


    public function boot()
    {
        echo "<b>＜MyServiceProvider/boot＞</b><br>";
    }
}
