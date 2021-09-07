<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;
use App\Facades\MyService;

class MyServiceController extends Controller
{
    public function index(int $id = -1)
    {
        MyService::setId($id);
        $data = [
            'msg'=> MyService::say(),
            'data'=> MyService::alldata()
        ];
        return view('myservice.index', $data);
    }
}
