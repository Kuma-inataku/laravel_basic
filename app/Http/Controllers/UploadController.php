<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        // note: https://reffect.co.jp/laravel/how_to_upload_file_in_laravel
        // $file->storeAs('', 'test.jpg');

        // s3に保存
        Storage::disk('s3')->putFile('/', $file);
    }

    public function download() {
        $result = Storage::disk('s3')->getAdapter()->getClient()->getObject(['Bucket' => env('AWS_BUCKET'), 'Key' => config('origin.s3_object.object_key')]);
        $carbon = new Carbon();
        $timestamps = $carbon->format('U');
        header('Content-Type: application/octet-stream');
        $filename = 'test_file' . $timestamps . '.jpg';
        header("Content-Disposition: attachment; filename={$filename}");
        
        // ダウンロード
        // これで指定したファイル名で自動的にダウンロードされる
        print($result['Body']);

        return null;
    }
}
