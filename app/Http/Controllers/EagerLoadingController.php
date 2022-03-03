<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EagerLoadingController extends Controller
{
    public function index() {
        $users = User::all();
        // foreach($users as $user) {
        //     $userAttribute = $user->userAttribute;
        // }
        $data = [
            'users' => $users,
        ];
        return view('eager_loading.index', $data);
    }
}
