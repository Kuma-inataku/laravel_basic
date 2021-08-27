<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\MyClasses\MyService as MyClassesMyService;
use Illuminate\Http\Request;
use App\MyClasses\MyService;

class CommentController extends Controller
{
    public function index(Request $request){
        $comments = Comment::get();
        // dump($comments); 
        return view('comments.index',['comments' => $comments]);
    }

    // public function myservice(MyService $myservice){
    public function myservice(){
        $myservice = app('App\MyClasses\MyService');
        $data = [
            'msg' => $myservice->say(),
            'data' => $myservice->data(),
        ];
        return view('myservice.index',$data);
    }
}
