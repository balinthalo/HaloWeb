@extends('components.base')
@section('content')
    <div class="flex flex-col items-center">
        <div id="output" class="flex py-2 px-3 w-1/5 bg-slate-50 rounded-lg break-all"></div>
        <form class="flex flex-col gap-2 w-1/4 mt-2" action="{{route('topic.store')}}" method="POST">
            @csrf
            <input id="input" class="py-3 px-4 placeholder:text-black rounded-xl w-full" type="text" name="title" placeholder="create new topic">
            <div class="flex justify-center">
                <input onclick="publish()" class="bg-green-500 px-4 py-3 rounded-2xl text-slate-950 hover:text-slate-50 w-1/3 justify-center" type="submit" value="Create new topic">
            </div>
            <input class="py-3 px-4 placeholder:text-black rounded-xl w-full" type="hidden" name="parent_id" value="{{ request()->query('parent_id') }}">
        </form>
    </div>
@endsection
