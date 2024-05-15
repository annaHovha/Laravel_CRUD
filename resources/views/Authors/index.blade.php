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
<div class="container">
<h1 class="text-center mt-3">Authors</h1>

<div>
    <a href="{{route('author.create')}}" class="btn btn-outline-primary">Add Author</a>
    <a href="{{route('book.index')}}" class="btn btn-outline-primary">Books</a>
</div>
<div>
    @if(session()->has('success'))
        <div class="alert alert-info mt-2">
            {{session('success')}}
        </div>
    @endif
</div>
    <div>
        <div class="d-flex justify-content-around">
            @foreach($authors as $author)
                <div class="border border-dark rounded mt-2 text-center p-5" style="height: 300px; width: 400px;">
                    <h2>{{$author->first_name}}</h2>
                    <h3>{{$author->last_name}}</h3>
                    <a href="{{route('author.show', ['author' => $author])}}" class="btn btn-info mt-3">Show</a>
                    <a href="{{route('author.edit', ['author' => $author])}}" class="btn btn-outline-primary mt-3">Edit</a>
                    <form method="post" action="{{route('author.destroy', ['author' => $author])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-outline-danger mt-1">
                    </form>
                </div>
            @endforeach
        </div>
    </div>
<br>
{{ $authors->links() }}
</div>
</body>
</html>
