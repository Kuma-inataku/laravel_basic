<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(Request $request){
        if ($request->is('request')) {
            echo 'requestアリ';
        }
        if ($request->routeIs('request2')) {
            echo 'request2アリ';
        }

        $url = $request->url();

        $urlWithQueryString = $request->fullUrl();
        $request->fullUrlWithQuery(['type' => 'phone']);

        dump($url);
        dump($urlWithQueryString);

        $method = $request->method();
        dump($method);

        if ($request->isMethod('get')) {
            echo 'GETメソッドです。';
        }

        $value = $request->header();
        dump($value);

        $contentTypes = $request->getAcceptableContentTypes();
        dump($contentTypes);

        dd($request->expectsJson());
        return view('request.index');
    }

    public function form(){
        echo 'aa';
        view('request.form');
    }

    public function confirm(Request $request){
        $inputs = $request->all();
        dd($inputs);
        view('request.confirm', $inputs);
    }
}
