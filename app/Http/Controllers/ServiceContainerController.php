<?php

namespace App\Http\Controllers;

use app\MyClasses\MyClass;
use app\MyClasses\Slack;

class ServiceContainerController extends Controller
{
    public function index()
    {
      // $slack = new \App\MyClasses\Slack;

      // $myClass = new \App\MyClasses\MyClass($slack);

      // $myClass->run();

      // // 登録
      // app()->bind('myclass', \App\MyClasses\MyClass::class);
      // // 呼び出し
      // $myClass = app()->make('myclass');
      // // 実行
      // $myClass->run();

      app()->bind('myclass', \App\MyClasses\MyClass::class);

      $myClass = app()->make('myclass');

      $myClass2 = app()->make('myclass');

      dd($myClass, $myClass2);
    }
}
