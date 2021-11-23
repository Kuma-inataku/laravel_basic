<?php

namespace App\MyClasses;

use App\MyClasses\Slack;

class MyClass
{
  public $message;

  public function __construct(Message $message){
      $this->message = $message;
  }

  public function run(){
      $this->message->send();
  }
}