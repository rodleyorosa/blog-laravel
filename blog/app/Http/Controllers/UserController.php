<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('authors.index', [
            'authors' => User::all()
        ]); 
    }

    public function create() {
        return view('authors.create', [
            'articles' => Article::all()
        ]);
    }

    public function show($id) {
        return view('authors.show', [
            'author' => User::findOrFail($id)
        ]);
    }

    // da modificare
    public function edit($id) {
        return view('authors.edit', [
            // 'author' => Author::findOrFail($id)
        ]);
    }
}
