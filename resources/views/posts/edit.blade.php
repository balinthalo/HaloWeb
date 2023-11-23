@extends('components.base')
@section('content')
    <div class="flex flex-col items-center mb-10">
        <form class="grid grid-cols-12" action="{{route('post.update', ['post' => $post, 'topic' => $topic])}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="col-span-11 flex flex-col items-center gap-4 bg-slate-300 p-8">
                <label>change post title</label>
                <input id="input" class="px-3 py-2 w-full" type="text" name="title" placeholder="{{$title}}" value="{{$title}}">
                <label>change post content</label>
                <textarea id="input" class="px-3 py-2 resize-y min-h-[2.5rem]" name="text" cols="30" rows="10">{{$text}}</textarea>
                <input onclick="publish()" class="bg-green-500 px-3 py-2 rounded-xl text-slate-950 hover:text-slate-50 cursor-pointer" type="submit" value="SAVE">
            </div>
            <div class="bg-blue-400"></div>
        </form>
    </div>
@endsection
