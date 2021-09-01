<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;

class MyServiceController extends Controller
{
    public function index(MyServiceInterface $myservice, int $id = -1){
        
        $myservice->setId($id);
        $data = [
            'msg' => $myservice->say(),
            'data' => $myservice->alldata(),
        ];
        return view('myservice.index',$data);
    }
}
