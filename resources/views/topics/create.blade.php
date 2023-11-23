@extends('components.base')
@section('content')
    <div class="flex flex-col items-center">
        <div class="grid grid-cols-12">
            <form class="flex flex-col gap-4 bg-slate-200 p-8 col-span-11" action="{{route('topic.store')}}" method="POST">
                @csrf
                <input id="input" class="py-3 px-4 placeholder:text-black w-full" type="text" name="title" placeholder="create new topic">
                <div class="flex justify-center">
                    <input onclick="publish()" class="cursor-pointer bg-green-500 px-4 py-3 rounded-2xl text-slate-950 hover:text-slate-50 justify-center" type="submit" value="Create new topic">
                </div>
                <input class="py-3 px-4 placeholder:text-black rounded-xl w-full" type="hidden" name="parent_id" value="{{ request()->query('parent_id') }}">
            </form>
            <div class="bg-green-400"></div>
        </div>
    </div>
@endsection
