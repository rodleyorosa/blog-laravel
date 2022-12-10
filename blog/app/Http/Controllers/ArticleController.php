<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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

    public function show($id) {
        $article = Article::findOrFail($id);
        return view('articles.show', [ 
            'author' => Author::findOrFail($id),
            'comments' => $article->comments,
            'article' => Article::findOrFail($id)
        ]);
    }

    public function edit($id) {
        return view('articles.edit', [
            'authors' => Author::all(),
            'article' => Article::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
        $article = Article::findOrFail($id);

        $validatedData = $request->validate([
            "title" => "required",
            "slug" => "required",
            "author_id" => "required",
            "content" => "required"
        ]);

        $article->fill($validatedData);
        $article->save();

        return redirect('/articles');
    }

    public function delete($id) {
        Article::destroy($id);
        
        return redirect('/articles');
    }

    public function indexByAuthor($id) {
        $author = Author::findOrFail($id);

        return view('articles.index', [
            "articles" => $author->articles,
            "author" => $author
            // "articles" => Article::where("author_id", $id)->get()
        ]);
    }

    public function storeComment(Request $request, $id) {
        $article = Article::findOrFail($id);

        $comments = new Comment();
        $comments->comment = $request->comment;
        $comments->article_id = $article->id;
        $comments->user_id = 1;

        $comments->save();
        return Redirect::back();
    }

}
