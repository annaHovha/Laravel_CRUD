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
    <div class="container p-5">
        <a href="{{route('book.index')}}" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Back</a>
        <h4 class="mt-2">Title:  <i>{{$book->title}}</i></h4>
        <h4 class="mt-2">Publication Year:  <i>{{$book->publication_year}}</i></h4>
        <div>
            <h4>Authors: @foreach($book->authors as $author)
                    <i>{{ $author->first_name }} {{ $author->last_name }}</i>
                @endforeach
            </h4>

        </div>
        <h5 class="mt-5">About:</h5>
        <p>{{$book->description}}</p>
    </div>
</body>
</html>
