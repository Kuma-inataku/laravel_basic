<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MyServiceController;
use App\Http\Controllers\WebpackController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RestappController;
use App\Http\Controllers\ServiceContainerController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MailSendController;
use App\Http\Controllers\StorageController;
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

// Route::get('/myservice',[MyServiceController::class, 'index']);
// Route::get('/myservice/{id?}',[MyServiceController::class, 'index']);
Route::get('/myservice',[MyServiceController::class, 'index'])->middleware('MyMW');
Route::get('/myservice/{id?}',[MyServiceController::class, 'index'])->middleware('MyMW');

Route::get('/webpack',[WebpackController::class, 'index']);

Route::get('/request',[RequestController::class, 'index'])->name('request2');
Route::get('/request/form',[RequestController::class, 'form']);
Route::post('/request/confirm',[RequestController::class, 'confirm']);
// Route::get('/request/{id}',[RequestController::class, 'index']);

// Route::get('/hello',[HelloController::class, 'index'])->middleware('auth');
Route::get('/hello/other',[HelloController::class, 'other']);
Route::get('/hello',[HelloController::class, 'index'])->name('hello.index');
// Route::get('/hello/{id}/{name}',[HelloController::class, 'save']);
Route::get('/hello/{id}',[HelloController::class, 'index']);
Route::post('/hello',[HelloController::class, 'index']);
Route::get('hello/session',[HelloController::class, 'ses_get']);
Route::post('hello/session', [HelloController::class,'ses_put']);
Route::get('/hello/auth',[HelloController::class, 'getAuth'])->middleware('auth');
Route::post('/hello/auth',[HelloController::class, 'postAuth']);
Route::get('hello/rest',[HelloController::class, 'rest']);
Route::get('/hello/json',[HelloController::class, 'json']);
Route::get('/hello/json/{id}',[HelloController::class, 'json']);

Route::get('/person',[PersonController::class, 'index']);
Route::get('person/find',[PersonController::class, 'find']);
Route::post('person/find',[PersonController::class, 'search']);

Route::resource('rest', RestappController::class);
Route::post('rest/create', [RestappController::class,'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/service-container',[ServiceContainerController::class, 'index'])->name('service-container.index');
Route::get('/service-provider',[ServiceProviderController::class, 'index'])->name('service-provider.index');

Route::get('/log',[LogController::class, 'index'])->name('log.index');

// メール送信
Route::get('/storage', [StorageController::class,'index'])->name('storage.index');
// Route::post('/storage', [StorageController::class,'index'])->name('storage.index');
