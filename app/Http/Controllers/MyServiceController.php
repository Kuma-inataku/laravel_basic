<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;
use App\Facades\MyService;

class MyServiceController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'msg'=> $request->hello,
            'data'=> $request->alldata
        ];
        return view('myservice.index', $data);
    }
}
