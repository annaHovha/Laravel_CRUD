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
        <h1 class="text-center mt-3">Books</h1>

        <div>
            <a href="{{route('book.create')}}" class="btn btn-outline-primary">Add Book</a>
            <a href="{{route('author.index')}}" class="btn btn-outline-primary">Authors</a>
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
                @foreach($books as $book)
                    <div class="border border-dark rounded mt-2 text-center p-5" style="height: 400px; width: 400px;">
                        <h2>{{$book->title}}</h2>
                        <h3>{{$book->publication_year}}</h3>
                        <div>
                            <p><strong>Authors:</strong></p>
                                @foreach($book->authors as $author)
                                    {{ $author->first_name }} {{ $author->last_name }} <br>
                                @endforeach
                        </div>
                        <a href="{{route('book.show', ['book' => $book])}}" class="btn btn-info mt-3">Show</a>
                        <a href="{{route('book.edit', ['book' => $book])}}" class="btn btn-outline-primary mt-3">Edit</a>
                        <form method="post" action="{{route('book.destroy', ['book' => $book])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-outline-danger mt-1">
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        {{ $books->links() }}
    </div>
</body>
</html>
