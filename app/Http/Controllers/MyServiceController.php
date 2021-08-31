<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\MyService;

class MyServiceController extends Controller
{
    function __construct(MyService $myservice)
    {
        // dd($myservice);
        $myservice = app('App\MyClasses\MyService');
        // dd($myservice);

    }
        public function index(MyService $myservice, int $id = -1){
            $myservice->setId($id);
            // dd($id);
            $data = [
                'msg' => $myservice->say($id),
                'data' => $myservice->alldata(),
            ];
            return view('myservice.index',$data);
        }
    }
