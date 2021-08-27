<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\MyClasses\MyService as MyClassesMyService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request){
        $comments = Comment::get();
        return view('comments.index',['comments' => $comments]);
    }
}
