@extends('layout')

@section('title')
    Blog | {{ isset($post) ? 'Modifica' : 'Crea' }} post
@endsection

@section('h1')
{{ isset($post) ? 'Modifica' : 'Crea' }} post
@endsection

@section('content')
<div class="mx-auto md:w-full">
  <div class="bg-white rounded shadow-md p-4">
    <form action="{{ isset($post) ? route('authors.posts.update', [$author->id, $post->id]) : route('authors.posts.store', $author->id) }}" method="POST">
      @csrf
      @isset($post)
          @method('PUT')
      @endisset
      <div class="flex flex-col pt-5">
        <div class="flex flex-col">
          <label for="title" class="font-bold pb-1">Titolo</label>
          <input
            type="text"
            id="title"
            name="title"
            placeholder="Title"
            value="{{ old('title') ?? $post->title ?? null }}"
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
            value="{{ old('slug') ?? $post->slug ?? null }}"
          >
          @error('slug')
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
          >{{ old('content') ?? $post->content ?? null }}</textarea>
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