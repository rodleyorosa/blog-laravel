@extends('layout')

@section('title')
    Crea Autore
@endsection

@section('h1')
{{ isset($author) ? 'Modifica' : 'Crea' }} autore
@endsection

@section('content')
<div class="mx-auto md:w-full">
  <form action="/authors" method="POST">
    @csrf
    <div class="flex flex-col pt-5">
      <div class="flex flex-col">
        <label for="name" class="font-bold pb-1">Nome</label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="Nome"
          value="{{ old('name') }}"
          class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
        >
        @error('name')
            <span class="text-red-500">
              {{ $message }}
            </span>
        @enderror
      </div>
      <div class="flex flex-col">
        <label for="surname" class="font-bold pb-1">Cognome</label>
        <input
          id="surname"
          name="surname"
          type="text"
          placeholder="Cognome"
          class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
          value="{{ old('surname') }}"
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
          placeholder="Email"
          value="{{ old('email') }}"
          class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
        >
        @error('email')
            <span class="text-red-500">
              {{ $message }}
            </span>
        @enderror
      </div>
      <div class="mt-4">
        <button class="btn">INVIA</button>
      </div>
    </div>
  </form>
</div>
@endsection