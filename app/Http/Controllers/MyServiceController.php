<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;

class MyServiceController extends Controller
{
    function __construct()
    {
    }
    public function index(MyServiceInterface $myservice, int $id = -1){
        $myservice->setId($id);
        $data = [
            'msg' => $myservice->say($id),
            'data' => $myservice->alldata(),
        ];
        return view('myservice.index',$data);
    }
}
