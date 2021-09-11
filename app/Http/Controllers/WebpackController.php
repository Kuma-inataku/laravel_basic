<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebpackController extends Controller
{
    public function index(){
        return view('sample.index');
    }
}
