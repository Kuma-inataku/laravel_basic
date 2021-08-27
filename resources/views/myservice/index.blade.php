<body>
  <p>
    {!!$msg!!}
  </p>
  <ul>
    @foreach($data as $item)
    <li>{!!$item!!}</li>
    @endforeach
  </ul>
</body>