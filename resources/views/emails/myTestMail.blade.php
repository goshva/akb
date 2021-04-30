<!DOCTYPE html>
<html>
<head>
    <title>https://xn--24-6kce8b.xn--80adxhks/</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <h2>{{ $details['body'] }}</h2>
    <p>{{ $details['username'] }}</p>
    @if(json_decode($details['products']))
    @foreach (json_decode($details['products']) as $prod)
    <p>
    <span>{{ $prod->name }}</span>    
    <span>{{ $prod->count }}</span>
    <span>{{ $prod->price }}</span>
    </p>
@endforeach
@endif
</br>
</body>
</html>