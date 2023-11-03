@extends('components.base')
@section('content')
    <div class="flex flex-col items-center gap-2">
        <div id="output" class="flex py-2 px-3 w-1/5 bg-slate-500 rounded-lg break-all">{{$topic}}</div>
        <form class="flex flex-col w-1/5 gap-2" action="{{route('topic.update', $id)}}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <input id="input" class="px-3 py-2 rounded-xl w-full" type="text" placeholder="{{$topic}}" value="{{$topic}}" name="title">
            <div class="flex justify-center">
                <input onclick="publish()" class="bg-green-500 px-3 py-2 rounded-xl text-slate-950 hover:text-slate-50" type="submit" value="SAVE">
            </div>
        </form>
    </div>
@endsection
