<?php

namespace App\MyClasses;

use App\MyClasses\Slack;

class MyClass
{
  public $slack;

  public function __construct(Slack $slack){

      $this->slack = $slack;

  }

  public function run(){

      $this->slack->send();

  }
}