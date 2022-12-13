@extends('layout')

@section('title')
    Blog
@endsection

@section('h1')
    Registrati
@endsection

@section('content')
<div class="mx-auto md:w-full">
  <div class="bg-white rounded shadow-md p-4">
    <form action="/register" method="POST">
      @csrf
        <div class="flex flex-col">
          <label for="name" class="font-bold pb-1">Nome</label>
          <input
            id="name"
            name="name"
            type="text"
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
            value="{{ old('surname') }}"
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
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
        <div class="flex flex-col">
          <label for="password" class="font-bold pb-1">Password</label>
          <input
            id="password"
            name="password"
            type="password"
            placeholder="Password"
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
          >
          @error('password')
              <span class="text-red-500">
                {{ $message }}
              </span>
          @enderror
        </div>
        <div class="flex flex-col">
          <label for="password_confirmation" class="font-bold pb-1">Conferma password</label>
          <input
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            placeholder="Conferma password"
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
          >
          @error('password_confirmation')
              <span class="text-red-500">
                {{ $message }}
              </span>
          @enderror
        </div>
        <div class="mt-4">
          <button class="btn">REGISTRATI</button>
        </div>
      </div>
      @error('login')
        <div class="text-red-500">
          {{ $message }}
        </div>
      @enderror
    </form>
  </div>
</div>
@endsection