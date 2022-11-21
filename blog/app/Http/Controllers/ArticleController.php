<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        return view('articles.index', [
            'articles' => Article::all()
        ]);
    }

    public function create() {
        return view('articles.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required'
        ]);

        Article::create($validatedData);
    
        return redirect('/articles');
    }

    public function getArticle($id) {
        return view('articles.article', [
            'article' => Article::findOrFail($id)
        ]);
    }
}
