<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpClientController extends Controller
{
    public function index()
    {
        $response = Http::get(route('request2'));
        $responses = Http::pool(function(Pool $pool) {
            $pool->get(route('request2'));
            $pool->get(route('upload.index'));
        });

        dd($responses);
    }
}
