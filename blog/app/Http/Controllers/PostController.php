<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PharIo\Manifest\Author;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPosts() {
        return view('posts.posts', [
            'posts' => Post::all()
        ]);
    }

    public function index(User $author)
    {
        return view('posts.index', [
            'author' => $author,
            'posts' => $author->posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $author)
    {
        return view('posts.form', [
            'author' => $author
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $author)
    {
        $validation = $request->validate([
            'title' => [
                'required',
                'unique:posts'
            ],
            'slug' => [
                'required'
            ],
            'content' => [
                'required'
            ]
        ]);

        $validation['user_id'] = $author->id;

        Post::create($validation);

        return redirect()->route('authors.posts.index', $author->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $author, Post $post)
    {
        $validation = $request->validate([
            'comment' => []
        ]);
        $validation['post_id'] = $post->id;
        $validation['user_id'] = $author->id;

        Comment::create($validation);
        
        return view('posts.show', [
            'author' => $author,
            'post' => $post,
            ''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(User $author,Post $post)
    {
        return view('posts.form', [
            'author' => $author,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $author, Post $post)
    {
        $validation = $request->validate([
            'title' => [
                'required',
                Rule::unique('posts')->ignore($post->id)
            ],
            'slug' => [
                'required'
            ],
            'content' => [
                'required'
            ]
        ]);

        $post->fill($validation);
        $post->save();

        return redirect()->route('authors.posts.index', $author->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $author, Post $post)
    {
        Post::destroy($post->id);

        return redirect()->back();
    }
}
