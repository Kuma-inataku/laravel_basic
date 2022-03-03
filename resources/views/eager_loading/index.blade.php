@extends('layouts.helloapp')

@section('title', 'Comments.index')

@section('menubar')
    @parent
    コメントページ
@endsection

@section('content')
<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>age</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
    </tr>
    @endforeach
</table>
<div style="margin:10px;"></div>
@endsection

@section('footer')
copyright 2017 tunano.
@endsection