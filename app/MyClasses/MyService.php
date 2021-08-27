<?php

namespace App\MyClasses;

use PhpParser\Node\Expr\FuncCall;

class MyService
{
  private $id = -1;
  private $msg = 'no id...';
  private $data = ['Hello', 'Welcome', 'Bye'];

  public function __construct(int $id = -1)
  {
    if($id >= 0)
    {
      $this->id = $id;
      $this->msg = 'select' . $this->data[$id];
    }
  }

  public function say()
  {
    return $this->msg;
  }

  public function alldata(){
    return $this->data;
    }
}