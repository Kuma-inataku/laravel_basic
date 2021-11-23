<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    public function index() {
        // $encrypt = app()->make('encrypter');
        // $password = $encrypt->encrypt('password');
        // dd($encrypt->decrypt($password));
        $name = app()->make('myName');

        dd($name);
    }
}
