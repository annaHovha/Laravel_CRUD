<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')->paginate(3);
        return view('books.index', ['books' => $books])->with(request()->input('page'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', ['authors' => $authors]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'publication_year' => 'required|numeric',
            'authors' => 'required|array'
        ]);

        $newBook = Book::create($data);
        $newBook->authors()->attach($data['authors']);
        return redirect(route('book.index'))->with('success','Book created successfully');
    }

    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', ['book' => $book], ['authors' => $authors]);
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'publication_year' => 'required|numeric',
            'authors' => 'required|array'
        ]);

        $book->update($data);
        $book->authors()->sync($data['authors']);
        return redirect(route('book.index'))->with('success','Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect(route('book.index'))->with('success','Book deleted successfully');
    }
}
