<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="w-25 d-flex justify-content-center border border-dark mx-auto" style="height:400px;">
    <form action="{{route('author.update', ['author' => $author])}}" method="post">
        @csrf
        @method('put')
        <input type="text" name="first_name" placeholder="First name" value="{{$author->first_name}}" class="mt-5"><br>
        <input type="text" name="last_name" placeholder="Last Name" value="{{$author->last_name}}" class="mt-3"><br>
        <input type="text" name="biography" placeholder="Biography" value="{{$author->biography}}" class="mt-3"><br>
        <button type="submit" class="mt-3 btn btn-primary">Update</button>
        <a href="{{route('author.index')}}" class="btn btn-primary mt-3">Back</a>
    </form>
</div>
</body>
</html>
