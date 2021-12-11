<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogController extends Controller
{
    public function index()
    {

        try {
            // エラー発生した時の処理
            throw new Exception('ユーザーは取得できませんでした。');
        } catch(Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
