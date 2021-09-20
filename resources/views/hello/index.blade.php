@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
   @parent
   インデックスページ
@endsection

@section('content')
   <p>{{$msg}}</p>
   @if (count($errors) > 0)
    <p>入力に問題あり。</p>
   @endif
   <table>
   <form action="" method="post">
       @csrf
        @if ($errors->has('msg'))
        <tr>        
            <th>Error</th>
            <td>{{ $errors->first('msg') }}</td>
        </tr>
        @endif
        <tr><th>Message: </th><td><input type="text" name="msg"
        value="{{old('msg')}}"></td></tr>
        <tr>
            <th>

            </th>
            <td>
               <input type="submit" value="send">
            </td>
        </tr>
    </form>
</table>
@endsection
@section('footer')
copyright 2017 tuyano.
@endsection
