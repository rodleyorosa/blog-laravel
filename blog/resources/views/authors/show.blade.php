@extends('layout')

@section('title')
    Autore
@endsection

@section('h1')
    {{ $author->name }} {{ $author->surname }}
@endsection

@section('content')
<div class="mx-auto md:w-full">
    <div class="bg-white rounded shadow-md p-4">
        <h1 class="text-2xl">{{ $author->name }} {{ $author->surname}}</h1>
        <ul>
            <li>{{ $author->name }}</li>
            <li>{{ $author->surname }}</li>
            <li>{{ $author->email }}</li>
        </ul>
        <p>{{ $author->description }}</p>
        <a href="/authors/{{ $author->id }}/{{ $author->name }}/articles">
            <button class="mt-4 transition duration:300 text-gray-400 hover:text-gray-900">Lista articoli di {{ $author->name }}</button>
        </a>
    </div>
</div>
@endsection

@section('posts')
<ul>
    @foreach ($author->articles as $article)
        <li class="transition duration:300 my-3 text-gray-400 hover:text-gray-900">
            <a href="/articles/{{ $article->id }}/{{ $article->slug }}">{{ $article->title }}</a>
        </li>   
    @endforeach
</ul>
@endsection