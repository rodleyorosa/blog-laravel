<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'blog')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
  
  <div class="main flex flex-col min-h-screen mx-auto w-full text-sm bg-gray">
    <nav class="bg-nav text-gray-200 shadow-md">
      <div class="py-6 px-2 sm:max-w-lg md:max-w-4xl items-center m-auto flex justify-between">
        <span class="text-xl"><a href="/">Blog</a></span>
        <div class="">
          <span class="pr-2"><a href="{{ route('posts') }}">Posts</a></span>
          <span class="pr-2"><a href="{{ route('authors.index') }}">Autori</a></span>
        </div>
        @auth            
        <div class="">
          <span class="mr-2">Ciao <span class="text-yellow-500">{{ Auth::user()->name }}</span>!</span>
          <a href="{{ route('logout') }}">Esci</a>
        </div>
        @endauth    
        @guest
        <div>
          <a href="{{ route('login') }}">Accedi</a>
        </div>
        @endguest       
      </div>
    </nav>

    <div class="flex-1 mx-auto sm:max-w-lg md:max-w-4xl w-full pt-5">
      <div class="flex mb-6">
        <h1 class="font-bold m-auto text-h1 text-2xl">
        @yield('h1')
        </h1>
        @yield('btn')
      </div>
      <div class="md:flex">
        <div class="bg-white h-fit mx-auto rounded shadow-md sm:max-w-lg mb-4 md:w-64 md:mr-4">
          <div class="p-4">
              <div class="mb-4">
                <img class="w-3/4 m-auto" src="{{ asset('images/logo_laravel.png') }}" alt="description of myimage">
              </div>
              <p>Lorem ipsum dolor sit amet consectetur adipi sicing elit. Eligendi labore vitae minus reprehenderit iste molestias vel, fuga debitis explicabo commodi veritatis. Error, dolor excepturi non amet in aperiam nulla reprehenderit.</p>
              <hr class="my-4">
              @isset (Auth::user()->name)
              <p>Your Featured Posts:</p>
              <ul>
                @foreach (Auth::user()->posts as $post)
                <li class="transition duration:300 my-3 text-gray-400 hover:text-gray-900">
                  <a href="{{ route('authors.posts.show', [$post->user_id, $post->id]) }}">{{ $post->title }}</a>
                </li>
                @endforeach
              </ul>
              @else
              <p>All Featured Posts:</p>
              <ul>
                {{-- <?php  ?>
                @foreach (Post::all() as $post)
                <li class="transition duration:300 my-3 text-gray-400 hover:text-gray-900">
                  <a href="/posts/{{ $post->id }}/{{ $post->slug }}">{{ $post->title }}</a>
                </li>
                @endforeach
                <?php ?> --}}
              </ul>
              @endisset
              <hr class="my-4">
              <div class="flex text-gray-400">
                  <span class="mr-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook transition duration-300 cursor-pointer hover:text-gray-800" viewBox="0 0 16 16">
                          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                      </svg>
                  </span>
                  <span class="mr-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram transition duration-300 cursor-pointer hover:text-gray-800" viewBox="0 0 16 16">
                          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                      </svg>
                  </span>
                  <span class="mr-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter transition duration-300 cursor-pointer hover:text-gray-800" viewBox="0 0 16 16">
                          <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                      </svg>
                  </span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin transition duration-300 cursor-pointer hover:text-gray-800" viewBox="0 0 16 16">
                      <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                  </svg>
              </div>
          </div>
      </div>
      @yield('content')
      </div>
    </div>
  </div>

  @yield('script')

</body>
</html>