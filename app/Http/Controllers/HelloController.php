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
use App\Http\Pagination\MyPaginator;
use App\Models\User;

class HelloController extends Controller
{
    // /**
    //  * index.
    //  *
    //  * @param Request $request
    //  * @return \Illuminate\Contracts\View\View
    //  */
    public function index(Request $request)
    {
        $user = User::first();
        // $user = User::firstOrFail();
        // if (is_null($user)) {
        //     abort(404);
        // }
        $userAttribute = $user->userAttribute;
        // if (false) {
        //     echo $hoge;
        // }
        if ($request) {
            echo $huga;
        }
        $re = Person::get();
        $fields = Person::get()->fields();
        $data = [
            'msg' => implode(',',$fields),
            'data' => $re,
        ];

        return view('hello.index', $data);
    }

    public function other()
    {
        $person = new Person();
        $person->all_data = ['aaa', 'bbb@ccc', 1234];
        $person->save();
        return redirect()->route('hello');
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

    // public function save($id, $name)
    // {
    //     $record = Person::find($id);
    //     $record->name = $name;
    //     $record->save();
    //     return redirect()->route('hello');
    // }

    public function json($id = -1)
    {
        if ($id == -1)
        {
            return Person::get()->toJson();
        }
        else
        {
            return Person::find($id)->toJson();
        }
    }
    
}
