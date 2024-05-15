<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Author;
//use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')->paginate(3);
        return view('books.index', compact('books'))->with(request()->input('page'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(BookRequest $request)
    {
        $newBook = Book::create($request->validated());
        $newBook->authors()->attach($request['authors']);
        return redirect(route('book.index'))->with('success','Book created successfully');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(BookRequest $request, Book $book)
    {

        $book->update($request);
        $book->authors()->sync($request['authors']);
        return redirect(route('book.index'))->with('success','Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect(route('book.index'))->with('success','Book deleted successfully');
    }
}
