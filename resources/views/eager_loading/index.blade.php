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
        <th>body</th>
    </tr>
    @foreach($comments as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->body}}</td>
    </tr>
    @endforeach
</table>
<div style="margin:10px;"></div>
@endsection

@section('footer')
copyright 2017 tunano.
@endsection