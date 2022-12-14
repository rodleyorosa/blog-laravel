<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule as ValidationRule;

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

        $request['slug'] = Str::slug($request->slug);

        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:articles',
            // 'author_id' => 'required',
            'content' => 'required'
        ]);

        $validatedData['author_id'] = Auth::user()->id;

        Article::create($validatedData);
    
        return redirect('/articles');
    }

    public function show($slug) {
        $article = Article::where('slug', $slug)->first();
        return view('articles.show', [ 
            'author' => $article->author,
            'comments' => $article->comments,
            'article' => $article
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

        $request['slug'] = Str::slug($request->slug);

        $validatedData = $request->validate([
            "title" => "required",
            "slug" => [
                "required",
                // ValidationRule::unique('articles')->ignore($id),
            ],
            // "author_id" => "required",
            "content" => "required"
        ]);

        $article->fill($validatedData);
        // $article->title = $request->title;
        // $article->slug = $request->slug;
        // $article->content = $request->content;

        $article->save();

        return redirect('/articles');
    }

    public function delete($id) {
        Article::destroy($id);
        
        return redirect('/articles');
    }

    public function indexByAuthor($id) {
        $author = User::findOrFail($id);

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
        $comments->user_id = Auth::user()->id;

        $comments->save();
        
        return Redirect::back();
    }

    public function updateComment(Request $request, $id) {
        $comment = Comment::find($id);
        $article = Article::find($id);

        $comment->comment = $request->comment;
        $comment->article_id = $article->id;
        $comment->user_id = Auth::user()->id;

        $comment->save();

        // return Redirect::back();
    }

}
