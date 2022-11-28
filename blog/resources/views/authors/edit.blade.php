@extends('layout')

@section('title')
    Modifica autore
@endsection

@section('h1')
{{ isset($author) ? 'Modifica' : 'Crea' }} autore
@endsection

@section('content')
<div class="mx-auto md:w-full">
  <div class="bg-white rounded shadow-md p-4">
    <form action="/authors/{{ $author->id }}" method="POST">
      @csrf
      <div class="flex flex-col pt-5">
        <div class="flex flex-col">
          <label for="name" class="font-bold pb-1">Nome</label>
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Name"
            value="{{ old('name') ? old('name') : $author->name }}"
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
          >
          @error('name')
              <span class="text-red-500">
                {{ $message }}
              </span>
          @enderror
        </div>
        <div class="flex flex-col">
          <label for="surname" class="font-bold pb-1">Surname</label>
          <input
            id="surname"
            name="surname"
            type="text"
            placeholder="Surname"
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
            value="{{ old('surname') ? old('surname') : $author->surname }}"
          >
          @error('surname')
              <span class="text-red-500">
                {{ $message }}
              </span>
          @enderror
        </div>
        <div class="flex flex-col">
          <label for="email" class="font-bold pb-1">Email</label>
          <input
            id="email"
            name="email"
            type="text"
            placeholder="email"
            value="{{ old('email') ? old('email') : $author->email }}"
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
          >
          @error('email')
              <span class="text-red-500">
                {{ $message }}
              </span>
          @enderror
        </div>
        <div class="flex justify-center">
          <input
            type="submit"
            class="transition duration-200 cursor-pointer w-32 rounded-lg bg-btn text-gray-100 p-2 mt-2 text-gray-800">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection