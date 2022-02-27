<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function index(Request $request) {
        // $users = User::all()->get();
        // foreach ($users as $user) {
        //     $text = 
        // }
        $user =  User::find(1);
        $message = $user ? 'user is here' : 'no user'; 
        $name = $user ? $user->name : 'no user';

        // $text = 'name :' . $user->name;
        // $create_timestamps = Carbon::now();
        // Storage::put('sample' . $create_timestamps->timestamp . '.txt' , $text);

        // $file = Storage::get('banana.jpg');
        // $path = '/images';
        // Storage::putFile($path, $file);

        $data = [
            'message' => $message,
            'name' => $name,
        ];
        return view('storage.index', $data);
    }
    public function 
}
