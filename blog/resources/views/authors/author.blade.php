@extends('layout')

@section('title')
    Autore
@endsection

@section('h1')
    Autore {{ $author->id }}
@endsection

@section('content')
<div class="mx-auto md:w-full">
    <div class="bg-white rounded border-2 p-4">
        <h1 class="text-2xl">{{ $author->name }} {{ $author->surname }}</h1>
        {{ $author }}
    </div>
</div>
@endsection