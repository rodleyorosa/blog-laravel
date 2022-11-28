@extends('layout')

@section('title')
    Articolo
@endsection

@section('h1')
    Articolo {{ $article->id }}
@endsection

@section('content')
<div class="mx-auto md:w-full">
    <div class="bg-white rounded shadow-md p-4">
        <h1 class="text-2xl">{{ $article->title }}</h1>
        <a href="/authors/{{ $author->id }}/{{ $author->name }}">
            <p class="uppercase my-2 text-xs text-gray-300">@ {{ $author->name }}{{ $author->surname }}</p>
        </a>
        <p class="uppercase my-2 text-xs text-gray-300">{{ $article->created_at->format('F d, Y') }} | <span class="transition duration-300 cursor-pointer hover:text-gray-800">music</span></p>
        <p>{{ $article->content }}</p>
    </div>
    <div class="bg-white p-4 mt-4 rounded-sm shadow-md">
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
    <div class="bg-white p-4 mt-1 rounded-sm shadow-md">
        <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            <p class="username">Da implementare</p>
            <p class="created-at">{{$comment->created_at->format('F d, Y')}}</p>
        </div>
        <div class="comment">
            {{$comment->comments}}
        </div>
    </div>
    @endforeach
</div>
@endsection