@extends('components.base')
@section('content')
    <div class="flex flex-col items-center gap-4 my-10">
        <div class="flex py-2 px-3 w-1/5 bg-slate-500 rounded-lg break-all" id="output"></div>
        <div class="flex py-2 px-3 w-1/5 bg-slate-500 rounded-lg break-all" id="output"></div>
    </div>
    <form class="flex flex-col  items-center gap-2" action="{{route('post.update', ['post' => $post, 'topic' => $topic])}}" method="POST">
        @csrf
        @method('PATCH')
        <input id="input" class="px-3 py-2 rounded-xl w-1/5" type="text" name="title" placeholder="{{$title}}" value="{{$title}}">
        <textarea id="input" class="px-3 py-2 rounded-lg resize-y min-h-[2.5rem] w-1/5" name="text" cols="30" rows="10">{{$text}}</textarea>
        <input onclick="publish()" class="bg-green-500 px-3 py-2 rounded-xl text-slate-950 hover:text-slate-50" type="submit" value="SAVE">
    </form>
@endsection
