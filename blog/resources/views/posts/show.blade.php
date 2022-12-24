@extends('layout')

@section('title')
    Post
@endsection

@section('h1')
    {{ $post->title }}
@endsection

@section('content')
<div class="mx-auto md:w-full">
    <div class="bg-white rounded shadow-md p-4">
        <h1 class="text-2xl">{{ $post->title }}</h1>
        <p class="uppercase my-2 text-xs text-gray-300">{{ $post->created_at->format('F d, Y') }} | 
            <a href="{{ route('authors.show', $author->id) }}">
                <span class="transition duration-300 cursor-pointer hover:text-gray-800">{{ $post->user->name }}{{ $post->user->surname }}</span>
            </a>
        </p>
        <p>{{ $post->content }}</p>
    </div>
    <div class="bg-white p-4 mt-4 rounded-sm shadow-md">
        <form class="flex"
        action="{{ route('authors.posts.show', [$author->id, $post->id]) }}" method="POST">
            @csrf
            <textarea placeholder="Add a comment..."
            class="border p-4 mr-4 outline-none"
            name="comment" type="text"></textarea>
            <div>
                <button class="btn">SEND</button>
            </div>
        </form> 
    </div>
    <h2 class="title blue-moderate my-5">COMMENT SECTION</h2>
    @foreach ($comments as $comment)
    <div class="bg-white p-4 mt-1 rounded-sm shadow-md">
        <div class="flex justify-between">
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                <p class="username">{{ $comment->user->name }}</p>
                <p class="created-at uppercase">{{ $comment->created_at->format('M d, Y') }}</p>
            </div>
            @auth
            @if(Auth::id() == $comment->user_id)  
            <div class="flex items-center">
                <span onclick="edit()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil mx-2 text-blue-500 cursor-pointer" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </span>
                <span>
                    <form action="{{ route('destroyComment', [$author->id, $post->id, $comment->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-red-500 cursor-pointer" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        </button>
                    </form>
                </span>
            </div>
            @endif
            @endauth
        </div>
        @if (Auth::id() == $comment->user_id)
        <div class="comment">
            <span id="comment">{{ $comment->comment }}</span>
            <form id="edit-comment" class="hidden" method="POST" action="{{ route('updateComment', [$author->id, $post->id, $comment->id]) }}">
                @csrf
                @method('PUT')
                <div class="flex">
                    <textarea
                    class="border p-4 mr-4 outline-none"
                    placeholder="Comment ..."
                    name="comment" id="" cols="30" rows="5">{{ $comment->comment }}</textarea>
                    <div class="ml-4">
                        <button class="btn">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
        @else
        <div class="comment">
            <span id="comment">{{$comment->comment}}</span>
        </div>
        @endif
    </div>
    @endforeach
</div>
@endsection

@section('script')
    <script>
        $isOpened = false;

        function edit() {
            $isOpened =! $isOpened
            console.log($isOpened)
            document.getElementById('comment').style.display = 'block'

            if($isOpened == true) {
                document.getElementById('comment').style.display = 'none';
                document.getElementById('edit-comment').style.display = 'block';
            } else {
                document.getElementById('comment').style.display = 'revert';
                document.getElementById('edit-comment').style.display = 'none';
            }
        }
    </script>
@endsection