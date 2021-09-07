<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MyServiceController;
use App\Models\Content;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contents/insert', function() {
    Content::create([
        'body' => 'Laravel is PHP framework!!',
    ]);
});

Route::get('/contents/insert2', function() {
    Content::create([
        'body' => 'PHP is programming language!!',
    ]);
});

Route::get('/contents/insert3', function() {
    Content::create([
        'body' => 'programming is a lot of fun!!',
    ]);
});

// 論理削除用
Route::get('/contents/softdelete', function() {
    Content::find(1)->delete();
});

// 論理削除確認用
Route::get('/contents/softdelete/getwith', function() {
    $content = Content::withTrashed()->whereNotNull('id')->get();
});

Route::get('/contents/softdelete/getonly', function() {
    $content = Content::onlyTrashed()->whereNotNull('id')->get();
});

// DI
// Route::get('/myservice',[CommentController::class, 'index']);

Route::get('/myservice',[MyServiceController::class, 'index']);
Route::get('/myservice/{id?}',[MyServiceController::class, 'index']);
// Route::get('/myservice',[MyServiceController::class, 'index'])->middleware(App\Http\Middleware\MyMiddleware::class);
// Route::get('/myservice/{id?}',[MyServiceController::class, 'index'])->middleware(App\Http\Middleware\MyMiddleware::class);