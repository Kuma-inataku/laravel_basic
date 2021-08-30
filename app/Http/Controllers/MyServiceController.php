<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\MyService;

class MyServiceController extends Controller
{
        public function index(int $id = -1){
            $myservice = app()->makeWith('App\MyClasses\MyService',['id' => $id]);
            $data = [
                'msg' => $myservice->say($id),
                'data' => $myservice->alldata(),
            ];
            return view('myservice.index',$data);
        }
    }
