@extends('components.base')
@section('content')
    <div class="flex justify-center">
        <form class="flex flex-col gap-2 pt-6 w-1/4" action="{{route('post.store', ["topic" => $topic])}}" method="POST">
            @csrf
            <input class="px-4 py-2 shadow-slate-500 shadow-lg" type="text" name="title">
            <textarea class="px-4 py-2 resize-y min-h-[2.5rem] shadow-slate-500 shadow-lg" name="text"></textarea>
            <div class="flex justify-center">
                <input class="bg-green-500 px-3 py-2 rounded-xl text-slate-950 hover:text-slate-50" type="submit" value="Create new post">
            </div>
        </form>
    </div>
@endsection
