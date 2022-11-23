<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComments() {
        return view('articles.article', [
            // 'article' => Article::findOrFail($id),
            'comments' => Comment::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'comment' => 'required'
        ]);

        Comment::create($validatedData);

        return redirect('/articles');
    }
}
