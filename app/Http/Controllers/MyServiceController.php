<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\MyService;

class MyServiceController extends Controller
{
        public function index(MyService $myservice, int $id = -1){
            $myservice->setId($id);
            $data = [
                'msg' => $myservice->say($id),
                'data' => $myservice->alldata(),
            ];
            return view('myservice.index',$data);
        }
    }
