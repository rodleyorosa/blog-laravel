@extends('layout')

@section('title')
    Blog | {{ isset($article) ? 'Modifica' : 'Crea' }} articolo
@endsection

@section('h1')
{{ isset($article) ? 'Modifica' : 'Crea' }} articolo
@endsection

@section('content')
<div class="mx-auto md:w-full">
  <div class="bg-white rounded shadow-md p-4">
    <form action="/articles/{{ $article->id }}" method="POST">
      @csrf
      <div class="flex flex-col pt-5">
        <div class="flex flex-col">
          <label for="title" class="font-bold pb-1">Titolo</label>
          <input
            type="text"
            id="title"
            name="title"
            placeholder="Title"
            value="{{ old('title') ? : $article->title }}"
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
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
            placeholder="Slug"
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
            value="{{ old('slug') ? old('slug') : $article->slug }}"
          >
          @error('slug')
              <span class="text-red-500">
                {{ $message }}
              </span>
          @enderror
        </div>

        <div class="flex flex-col">
          <label for="author_id" class="font-bold pb-1">Autore</label>
          <select
            id="author_id"
            name="author_id"
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
          >
          @foreach ($authors as $author)
          <option value="{{ old('author_id') }}">{{ $author->name }} {{ $author->surname }}</option>
          @endforeach
          </select>
          @error('author_id')
              <span class="text-red-500">
                {{ $message }}
              </span>
          @enderror
        </div>

        <div class="flex flex-col">
          <label for="content" class="font-bold pb-1">Content</label>
          <textarea
            id="content"
            name="content"
            type="text"
            placeholder="Scrivi ..."
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
          >{{ old('content') ? old('content') : $article->content }}
          </textarea>
          @error('content')
              <span class="text-red-500">
                {{ $message }}
              </span>
          @enderror
        </div>
        <div class="">
          <button class="btn mt-4">INVIA</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection