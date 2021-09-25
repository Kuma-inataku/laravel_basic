<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HelloRequest;
use App\Models\Order;
use App\Models\Person;
use Dotenv\Loader\Resolver;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class HelloController extends Controller
{
    public function index(Request $request)
    {
        // $user = Auth::user();
        // $sort = $request->sort;
        // $sort = 'name';
        // $items = Person::orderBy($sort, 'asc')->simplePaginate(5);
        // $param = ['items' => $items, 'sort' => $sort, 'user' => $user];
        // return view('hello.index', $param);
        $orders = Order::with('orderable');
        
        $orders = Order::query()
        ->with(['orderable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                User::class => ['userAttribute'],
            ]);
        }])->get();

        dump($orders);
    }

    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインしてください'];
        return view('hello/auth', $param);
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            $msg = 'ログインしました。';
        }else{
            $msg = 'ログインに失敗しました。';
        }
        return view('hello.auth', ['message' => $msg]);
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
