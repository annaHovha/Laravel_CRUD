<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(3);
        return view('authors.index', compact('authors'))->with(request()->input('page'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(AuthorRequest $request)
    {
        $newAuthor = Author::create($request->validated());

        return redirect(route('author.index'))->with('success','Author added successfully');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request);

        return redirect(route('author.index'))->with('success', 'Author updated successfully');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect(route('author.index'))->with('success', 'Author deleted successfully');
    }
}
