<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;
use App\Facades\MyService;

class MyServiceController extends Controller
{
/* Service Providerの利用 */
    public function index(MyServiceInterface $myservice,int $id = -1)
    {
        $myservice->setId($id);
        $data = [
            'msg'=> $myservice->say(),
            'data'=> $myservice->alldata()
        ];
        return view('myservice.index', $data);
    }
}
