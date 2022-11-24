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
    <div>
        <form action="/articles/{{ $article->id }}/{{ $article->slug }}" method="POST">
            @csrf
            <label for="comment">Commento</label>
            <input class="border-2"
            name="comment" type="text">
            <input type="submit">
        </form>
    </div>
    <div>
        
    </div>
</div>
@endsection