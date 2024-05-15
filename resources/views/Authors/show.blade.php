<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Information about author</title>
</head>
<body>
<div class="container p-5">
    <a href="{{route('author.index')}}" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Back</a>
    <h3 class="mt-2">First Name: <i>{{$author->first_name}}</i></h3>
    <h3 class="mt-2">Last Name: <i>{{$author->last_name}}</i></h3>
    <h5 class="mt-5">Biography:</h5>
    <p>{{$author->biography}}</p>
</div>
</body>
</html>
