<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request){
        $comments = Comment::get();
        dump($comments);
        return view('comments.index',['comments' => $comments]);
    }
}
