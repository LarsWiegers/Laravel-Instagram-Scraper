<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css" type="text/css">
        <title>Instagram Scraper</title>

    </head>
    <body>
    <div class="container home" style="text-align:center">
        <h1>{{$title}}</h1>
       @foreach($images as $image)
           <img src="{{$image}}" style="width:300px">
       @endforeach
    </div>
    </body>
</html>
