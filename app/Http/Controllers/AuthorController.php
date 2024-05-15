<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(3);
        return view('authors.index', ['authors' => $authors])->with(request()->input('page'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'biography'=>'required',
        ]);

        $newAuthor = Author::create($data);

        return redirect(route('author.index'))->with('success','Author added successfully');
    }

    public function show(Author $author)
    {
        return view('authors.show', ['author' => $author]);
    }

    public function edit(Author $author)
    {
        return view('authors.edit', ['author' => $author]);
    }

    public function update(Request $request, Author $author)
    {
        $data= $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'biography'=>'required',
        ]);

        $author->update($data);

        return redirect(route('author.index'))->with('success', 'Author updated successfully');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect(route('author.index'))->with('success', 'Author deleted successfully');
    }
}
