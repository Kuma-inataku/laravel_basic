<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index(){
        return view('upload.index');
    }
    public function store(Request $request){
        // dd($request->file('file'));
        $file = $request->file('file');
        $file->storeAs('', 'test.jpg');

        // Storage::disk('s3')->putFile('/', $file);
        // /storage/appに保存される
        // $file->store('');
    }
}
