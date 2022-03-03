@extends('layouts.helloapp')

@section('title', 'Comments.index')

@section('menubar')
    @parent
    N+1発生
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
        <td>{{$user->userAttribute->age}}</td>
    </tr>
    @endforeach
</table>
<div style="margin:10px;"></div>
@endsection

@section('footer')
copyright 2017 tunano.
@endsection