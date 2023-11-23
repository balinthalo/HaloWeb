@extends('components.base')
@section('content')
    <div class="flex justify-center">
        <div class="grid grid-cols-12">
            <form class="flex flex-col gap-4 col-span-11 p-8 bg-slate-200" action="{{route('post.store', ["topic" => $topic])}}" method="POST">
                @csrf
                <input class="px-4 py-2" type="text" name="title" placeholder="title">
                <textarea class="px-4 py-2 resize-y min-h-[10rem]" name="text" placeholder="text"></textarea>
                <div class="flex justify-center">
                    <input class="bg-green-500 px-3 py-2 text-slate-950 hover:text-slate-50 cursor-pointer rounded-2xl" type="submit" value="Create new post">
                </div>
            </form>
            <div class="bg-green-400"></div>
        </div>
    </div>
@endsection
