<!doctype html>
<html lang="ja">
<head>
    <title>Index</title>
    <link href="/basic_laravel/public/css/app.css"  rel="stylesheet">
    ……必要に応じて記述……
    <script>
    function doAction(){
        var id = document.querySelector('#id').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/basic_laravel/public/hello/json/' + id, true);
        xhr.responseType = 'json';
        xhr.onload = function(e) {
            if (this.status == 200) {
                var result = this.response;
                document.querySelector('#name').textContent = result.name;
                document.querySelector('#mail').textContent = result.mail;
                document.querySelector('#age').textContent = result.age;
            }
        };
        xhr.send();
    }
    </script>
</head>
<body>
    <h1>Hello/Index</h1>
    <div>
        <input type="number" id="id" value="1">
        <button onclick="doAction();">Click</button>
    </div>
    <ul>
    <li id="name"></li>
    <li id="mail"></li>
    <li id="age"></li>
    </ul>
</body>
</html>
