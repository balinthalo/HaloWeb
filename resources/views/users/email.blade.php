@extends('components.base')
@section('content')
    <div class="flex justify-center items-center">
        <div class="grid grid-cols-11">
            <form class="bg-slate-200 flex flex-col col-span-11" action="">
                <div class="flex justify-center pt-4 gap-2">
                    <a href="{{route('user.password')}}" class="px-8 pb-2 text-slate-400 hover:text-slate-950 border-b-2 hover:border-blue-700">password</a>
                    <a href="" class="px-8 pb-2 text-slate-950 border-b-2 border-blue-700">email</a>
                </div>
                <div class="p-8 flex flex-col gap-4">
                    <input class="p-2" type="email" name="" placeholder="old email">
                    <input class="p-2" type="email" name="" placeholder="new email">
                    <div class="flex justify-center">
                        <input class="bg-green-500 px-3 py-2 rounded-xl hover:text-slate-50 text-slate-950" type="submit" value="save chages">
                    </div>
                </div>
            </form>
            <div class="bg-blue-400"></div>
        </div>
    </div>
@endsection
