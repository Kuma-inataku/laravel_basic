<!doctype html>
<html lang="ja">
<head>
    <title>soft delete</title>
    <link href="/basic_laravel/public/css/app.css"  rel="stylesheet">
</head>
<body>
    <h1>Hello/softdelete</h1>
    @foreach ($users as $user)
        <ul>
            <li>{{ $user->name }} | {{ $user->email }}</li>
        </ul>
    @endforeach
</body>
</html>
