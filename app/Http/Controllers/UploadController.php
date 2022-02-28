<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class UploadController extends Controller
{
    public function index(){
        return view('upload.index');
    }

    public function store(Request $request){
        $file = $request->file('file');

        // ローカル(/storage/app)に名前指定で保存
        // note: https://reffect.co.jp/laravel/how_to_upload_file_in_laravel
        // $file->storeAs('', 'test.jpg');

        // s3に保存
        Storage::disk('s3')->putFile('/', $file);
    }

    public function streamingDownload() {
        // note: https://qiita.com/sakuraya/items/7b404d131353916aaad9
        $result = Storage::disk('s3')->getAdapter()->getClient()->getObject(['Bucket' => env('AWS_BUCKET'), 'Key' => config('origin.s3_object.object_key')]);
        $carbon = new Carbon();
        $timestamps = $carbon->format('U');
        header('Content-Type: application/octet-stream');
        $filename = 'test_file' . $timestamps . '.jpg';
        header("Content-Disposition: attachment; filename={$filename}");
        
        // ダウンロード
        // これで指定したファイル名で自動的にダウンロードされる
        print($result['Body']);

        return view('upload.index');
    }

    public function getFile() {
        // note: https://pgmemo.tokyo/data/archives/1759.html
        // 配列で取得
        // $list = Storage::disk('s3')->files('');
        // $list = Storage::disk('s3')->allFiles('');

        // note: https://traveler0401.com/aws-sdk-s3-get-object/
        // GuzzleHttp\Psr7\Streamで取得。こっからの加工方法がわからない...
        $result = Storage::disk('s3')->getAdapter()
            ->getClient()
            ->getObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key' => config('origin.s3_object.object_key')
            ]);
        $body = $result['Body'];
        dd($result);
    }

    public function zipDownload() {
        // note: https://reffect.co.jp/laravel/laravel-create-zip-file
        // zipArchiveでダウンロード
        $files = glob(public_path().'/storage/files/*');
        $zip = new ZipArchive();
        $zip->open(public_path().'/test.zip', ZipArchive::CREATE);

        foreach($files as $file){
            $file_info = pathinfo($file);
            $file_name = $file_info['filename'].'.'.$file_info['extension'];
            $zip->addFile($file, $file_name);
        }

        $zip->close();

        return response()->download(public_path().'/test.zip'); 
    }
}
