@extends('layout')

@section('title')
    Blog | Crea articolo
@endsection

@section('h1')
    Crea Articolo
@endsection

@section('btn')
<a href="articles/new"
class="transition float-right duration-200 rounded bg-btn text-gray-100 w-28 text-center p-2">Crea articolo</a>
@endsection

@section('content')
{{ $request }}
<div class="mx-auto md:w-full">
  <div class="bg-white rounded shadow-md p-4">
  <form action="/articles" method="POST">
    @csrf
    <div class="flex flex-col pt-5">
      <div class="flex flex-col">
        <label for="title" class="font-bold pb-1">Titolo</label>
        <input
          type="text"
          id="title"
          name="title"
          placeholder="Articolo dell'anno 2022"
          class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
          @if (isset($article))
            value="{{ old('title') ? old('title') : $article->title }}"
          @else
            value="{{ old('title') }}"
          @endif
        >
        @error('title')
            <span class="text-red-500">
              {{ $message }}
            </span>
        @enderror
      </div>
      <div class="flex flex-col">
        <label for="slug" class="font-bold pb-1">Slug</label>
        <input
          id="slug"
          name="slug"
          type="text"
          placeholder="articolo-dell-anno-2022"
          class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
          @if (isset($article))
            value="{{ old('slug') ? old('slug') : $article->slug }}"
          @else
            value="{{ old('slug') }}"
          @endif
        >
        @error('slug')
            <span class="text-red-500">
              {{ $message }}
            </span>
        @enderror
      </div>
      {{-- <div class="flex flex-col">
        <label for="author_id" class="font-bold pb-1">Autore</label>
        <select
          id="author_id"
          name="author_id"
          type="text"
          placeholder="lorem ipsum"
          class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
        >
        @foreach ($authors as $author)
          <option
              value="{{ $author->id }}">{{ $author->name }} {{ $author->surname }}</option>
        @endforeach  
        </select>
        @error('author_id')
            <span class="text-red-500">
              {{ $message }}
            </span>
        @enderror
      </div> --}}
      <div class="flex flex-col">
        <label for="content" class="font-bold pb-1">Testo</label>
        <textarea
          id="content"
          name="content"
          type="text"
          placeholder="Scrivi ..."
          class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
        >@if(isset($article)){{ old('content') ? old('content') : $article->content }}@else{{ old('content') }}@endif</textarea>
        @error('content')
            <span class="text-red-500">
              {{ $message }}
            </span>
        @enderror
      </div>
      <div class="mt-4">
        <button class="btn">CREA</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection