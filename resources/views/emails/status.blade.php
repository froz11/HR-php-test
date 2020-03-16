<html lang="ru">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>
    Заказ №{{$data['number']}} завершен

</h2>
<br>

Товары:
<ul>
    @foreach($data['products'] as $product)
        <li>{{ $product }}</li>
    @endforeach
</ul>
<br>
На сумму: {{ $data['summ'] }}

</body>
</html>