<?php

namespace App\Http\Controllers;

class ServiceContainerController extends Controller
{
    public function index()
    {
      // $slack = new \App\MyClasses\Slack;

      // $myClass = new \App\MyClasses\MyClass($slack);

      // $myClass->run();

      // 登録
      app()->bind('myclass', \App\MyClasses\MyClass::class);
      // 呼び出し
      $myClass = app()->make('myclass');
      // 実行
      $myClass->run();
    }
}
