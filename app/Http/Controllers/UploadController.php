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

        // ローカル(/storage/app)に名前指定で保存
        // $file->storeAs('', 'test.jpg');

        // s3に保存
        Storage::disk('s3')->putFile('/', $file);
    }
}
