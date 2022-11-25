@extends('layout')

@section('title')
    Articolo
@endsection

@section('h1')
    Articolo {{ $article->id }}
@endsection

@section('content')
<div class="mx-auto md:w-full">
    <div class="bg-white rounded border-2 p-4">
        <h1 class="text-2xl">{{ $article->title }}</h1>
        <a href="/authors/{{ $author->id }}/{{ $author->name }}">
            <p class="uppercase my-2 text-xs text-gray-300">@ {{ $author->name }}{{ $author->surname }}</p>
        </a>
        <p class="uppercase my-2 text-xs text-gray-300">{{ $article->created_at->format('F d, Y') }} | <span class="transition duration-300 cursor-pointer hover:text-gray-800">music</span></p>
        <p>{{ $article->content }}</p>
    </div>
    <div class="bg-white p-4 mt-4 rounded-sm shadow-sm border-2">
        <form class="flex"
        action="/articles/{{ $article->id }}/{{ $article->slug }}" method="POST">
            @csrf
            <textarea placeholder="Add a comment..." class="border p-4 mr-4"
            name="comments" type="text"></textarea>
            <div>
                <button class="btn-send">SEND</button>
            </div>
        </form> 
    </div>
    <h2 class="title blue-moderate my-5">COMMENT SECTION</h2>
    @foreach ($comments as $comment)
    <div class="bg-white p-4 mt-1 rounded-sm shadow-sm border-2">
        {{$comment->comments}}
    </div>
    @endforeach
</div>
@endsection