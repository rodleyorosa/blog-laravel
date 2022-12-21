@extends('layout')

@section('title')
    Blog | Lista autori
@endsection

@section('h1')
    Lista autori
@endsection

@section('content')
    <div class="mx-auto md:w-full">
        <ul class="bg-white p-4 shadow-md rounded">
            <h2 class="font-semibold mb-2 text-xl">Autori</h2>
            @foreach ($authors as $author)
            <div class="flex justify-between my-4">
                <li><a href="{{ route('authors.show', $author->id) }}">{{ $author->name }} {{ $author->surname }} <span class="mx-2">-</span> 
                    <span>{{ $author->posts->count() }} 
                        @if ($author->posts->count() == 1)
                            articolo
                        @else
                            articoli
                        @endif
                    </span>
                </a></li>
            </div>
            @endforeach
        </ul>
    </div>
@endsection