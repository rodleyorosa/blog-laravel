<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        return view('articles.index', [
            'articles' => Article::all()
        ]);
    }

    public function create() {
        return view('articles.create', [
            'authors' => Author::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'author_id' => 'required',
            'content' => 'required'
        ]);

        Article::create($validatedData);
    
        return redirect('/articles');
    }

    public function getArticle($id) {
        return view('articles.article', [
            'author' => Author::findOrFail($id),
            'article' => Article::findOrFail($id)
        ]);
    }

    //edit not done

    public function delete($id) {
        Article::destroy($id);
        
        return redirect('/articles');
    }

}
