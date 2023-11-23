@extends('components.base')
@section('content')
<div class="flex items-center justify-center mt-10">
    <div class="grid grid-cols-12">
        <form class="grid col-span-11 gap-4 bg-slate-200 p-8 place-items-center" action="{{route('topic.update', $id)}}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <label>change topic title</label>
            <input id="input" class="px-3 py-2 w-full" type="text" placeholder="{{$topic}}" value="{{$topic}}" name="title">
            <div class="flex justify-center">
                <input onclick="publish()" class="bg-green-500 px-3 py-2 rounded-xl text-slate-950 hover:text-slate-50 cursor-pointer" type="submit" value="SAVE">
            </div>
        </form>
        <div class="bg-blue-400"></div>
    </div>
</div>
@endsection
