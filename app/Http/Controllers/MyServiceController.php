<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;
use App\Facades\MyService;

class MyServiceController extends Controller
{
    // public function index(int $id = -1)
    // {
    //     MyService::setId($id);
    //     $data = [
    //         'msg' => MyService::say(),
    //         'data' => Myservice::alldata(),
    //     ];
    //     return view('myservice.index',$data);
    // }
    public function index(int $id = -1)
    {
        MyService::setId($id);
        $data = [
            'msg'=> MyService::say(),
            'data'=> MyService::alldata()
        ];
        return view('hello.index', $data);
    }
    // public function index(Request $request){
    //     $data = [
    //         'msg' => $request->msg,
    //         'data' => $request->alldata,
    //     ];
    //     return view('myservice.index',$data);
    // }
}
