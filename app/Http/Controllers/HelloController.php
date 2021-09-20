<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->query(),[
            'id' => 'required',
            'pass' => 'required',
        ]);
        if($validator->fails()){
            $msg = 'クエリに問題あり';
        }else{
            $msg = 'ID/PASSをうけつけました。フォームを入力してください';
        }
        return view('hello.index', ['msg' => $msg]);
    }

    public function post(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];
        $messages = [
            'name.required' => '名前は必ず入力してください',
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で記入してください。',
            'age.min' => '年齢は0歳以上で入力してください',
            'age.max' => '年齢は200歳以下で入力してください',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->sometimes('age','min:0',function($input){
            // 整数の時にfalseを返す
            return !is_int($input->age);
        });
        $validator->sometimes('age','max:200',function($input){
            return !is_int($input->age);
        });
        if($validator->fails()){
            return redirect('/hello')
                ->withErrors($validator)
                ->withInput();
        }
        return view('hello.index', ['msg' => '正しく入力されました。']);
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
 }
