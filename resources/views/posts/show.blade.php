@extends('components.base')
@section('content')
    <div class="flex flex-col items-center">
        <div class="grid grid-cols-12 w-1/2 mb-8">
            <div class="col-span-2 flex flex-col items-center gap-1">
                <a href="{{route('user.show', ['user_id' => $post->user->id])}}" class="flex flex-col items-center">
                    @include('layouts.profile', ['user' => $post->user, 'class' => 'rounded-3xl w-[100px] h-[100px]'])
                    <div>{{$post->user->name}}</div>
                </a>
                <p class="">
                    @include('components.date', ['data' => $post])
                </p>
            </div>
            <div class="flex flex-col bg-slate-400 shadow-lg p-4 col-span-10">
                <p class="font-bold text-2xl">{{$post->title}}</p>
                <p class="text-xl pl-4 whitespace-pre-wrap">{{$post->text}}</p>
            </div>
        </div>
        @foreach ($comments as $comment)
            <div class="bg-slate-300 w-1/2 my-2 px-4 ml-4 py-4 flex-col shadow-lg">
                <div class="flex">
                    <div class="px-6 pt-2 flex flex-col items-center gap-1 w-[170px]">
                        <a href="{{route('user.show', ['user_id' => $comment->user->id])}}" class="flex flex-col items-center">
                            @include('layouts.profile', ['user' => $comment->user, 'class' => 'rounded-3xl w-[100px] h-[100px] mt-3'])
                            <div>{{$comment->user->name}}</div>
                        </a>
                        <div>
                            @include('components.date', ['data' => $comment])
                        </div>
                    </div>
                    <p class="pt-3 w-4/5 break-all whitespace-pre-wrap">{{$comment->text}}</p>
                    @if (auth()->user()->id === 1 || $comment->user->id == auth()->user()->id)
                        <form class="flex items-end" action="{{route('comment.delete', ['post' => $post->id, 'topic' => $topic->id, 'comment' => $comment->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="hover:text-red-700/90" type="submit" value="DEL">
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
        <form class="flex flex-col mt-2 gap-2 w-1/4 my-10" action="{{route('comment.store', ['post' => $post->id, 'topic' => $post->topic_id])}}" method="POST">
            @csrf
            <textarea class="px-4 shadow-xl mb-5 py-2 resize-y min-h-[2.5rem] mt-10 bg-slate-200/75" name="text"></textarea>
            <div class="flex justify-center">
                <input class="bg-green-500 px-3 py-2 rounded-xl text-slate-950 hover:text-slate-50 cursor-pointer" type="submit" value="Comment">
            </div>
        </form>
    </div>
@endsection
