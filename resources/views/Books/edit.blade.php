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
    <form action="{{route('book.update', ['book' => $book])}}" method="post">
        @csrf
        @method('put')
        <input type="text" name="title" placeholder="Title" value="{{$book->title}}" class="mt-5"><br>
        <input type="text" name="description" placeholder="Description" value="{{$book->description}}" class="mt-3"><br>
        <input type="number" name="publication_year" placeholder="Publication Year" value="{{$book->publication_year  }}" class="mt-3"><br>
        <div class="mt-3">
            <label for="authors">Authors:</label><br>
            <select name="authors[]" id="authors" class="form-select" multiple>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $book->authors->contains($author->id) ? 'selected' : '' }}>
                        {{ $author->first_name }} {{ $author->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Update</button>
        <a href="{{route('book.index')}}" class="btn btn-primary mt-3">Back</a>
    </form>
</div>
</body>
</html>
