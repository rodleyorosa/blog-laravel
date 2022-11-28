@extends('layout')

@section('title')
    Autore
@endsection

@section('h1')
    Autore {{ $author->id }}
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
        <a href="/authors/{{ $author->id }}/{{ $author->name }}/articles">Lista articoli di {{ $author->name }}</a>
    </div>
</div>
@endsection