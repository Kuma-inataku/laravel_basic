<!doctype html>
<html lang="ja">
<head>
    <title>Index</title>
    <link rel="stylesheet" href="/basic_laravel/public/css/app.css">
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{{$msg}}</p>
    <table border="1">
    @foreach($data as $item)
    <tr>
        <th>{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td> 
        <td>{{$item->age}}</td>
    </tr>
    @endforeach
    </table>
    <hr>
</body>

</html>
