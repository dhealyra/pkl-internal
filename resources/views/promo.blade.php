<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($a && $b) 
        Promo untuk : {{ $a }} <br>
        Kode Promo : <strong>{{ $b }}</strong> 
    @elseif($a)
        Promo untuk : {{ $a }}
    @else 
        Semua promo
    @endif
</body>
</html>