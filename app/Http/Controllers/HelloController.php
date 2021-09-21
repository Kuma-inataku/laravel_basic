<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HelloRequest;
use Dotenv\Loader\Resolver;
use Illuminate\Http\Response;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        if($request->hasCookie('msg')){
            $msg = 'Cookie: '.$request->cookie('msg');
        }else{
            $msg = '※クッキーはありません。';
        }
        return view('hello.index', ['msg'=> $msg]);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = new Response(view('hello.index', ['msg' => '「'. $msg.'」をクッキーに保存しました。']));
        $response->cookie('msg',$msg,100);
        return $response;
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        return redirect('/hello');
    }
    
    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg',$msg);
        return redirect('hello/session');
    }
}
