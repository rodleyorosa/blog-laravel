@extends('layout')

@section('title')
    Blog
@endsection

@section('h1')
    Login
@endsection

@section('content')
<div class="mx-auto md:w-full">
  <div class="bg-white rounded shadow-md p-4">
    <form action="/login" method="POST">
      @csrf
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
            placeholder="password"
            class="shadow-md outline-none p-1 px-2 rounded border border-blue-200"
          >
        </div>
        <div class="mt-4">
          <button class="btn">INVIA</button>
          <span>o <a href="/register">Registrati</a></span>
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