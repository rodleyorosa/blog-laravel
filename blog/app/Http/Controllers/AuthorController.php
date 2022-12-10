<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        return view('authors.index', [
            'authors' => Author::all()
        ]);
    }

    public function create() {
        return view('authors.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'description' => 'required'
        ]);

        Author::create($validatedData);

        return redirect('/authors');
    }

    public function getAuthor($id) {
        return view('authors.author', [
            'author' => Author::findOrFail($id)
        ]);
    }

    public function edit($id) {
        return view('authors.edit', [
            'author' => Author::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
        $author = Author::findOrFail($id);

        $validatedData = $request->validate([
            "name" => "required",
            "surname" => "required",
            "email" => "required",
            'description' => 'required'
        ]);

        $author->fill($validatedData);
        $author->save();

        return redirect('/authors');
    }

    public function delete($id) {
        Author::destroy($id);
        
        return redirect('/authors');
    }
}
