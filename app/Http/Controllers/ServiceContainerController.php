<?php

namespace App\Http\Controllers;

class ServiceContainerController extends Controller
{
    public function index()
    {
      $slack = new \App\MyClasses\Slack;

      $myClass = new \App\MyClasses\MyClass($slack);

      $myClass->run();
    }
}
