<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SoftDeleteController extends Controller
{
    public function index()
    {
        $users = User::get();

        dump($users);

        return view('hello.soft-delete', ['users' => $users]);
    }
    
    public function store()
    {
        $users->create([
            
        ])
    }
}
