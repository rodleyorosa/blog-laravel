<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index() {
        return view('authors.index', [
            'query' => 
                DB::table('authors')
                ->select(array('authors.name', DB::raw('COUNT(articles.author_id) as count')))
                ->join('articles', 'articles.author_id', '=', 'authors.id')
                ->get(),
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
            'email' => 'required|email'
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
            "email" => "required"
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
