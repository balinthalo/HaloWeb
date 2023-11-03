@extends('components.base')
@section('content')
<div class="flex justify-center mt-10">
    <form class="flex flex-col gap-4 bg-slate-200 p-8" action="{{ route('registrationAuth') }}" method="POST">
        @csrf
        <div class="flex p-4">
            <div class="p-3 bg-slate-50">
                <x-svg class="" svg="/icons/edit.svg#email"/>
            </div>
            <input class="p-2 bg-slate-50 placeholder:text-black" type="email" name="email" placeholder="email">
        </div>
        <div class="flex p-4">
            <div class="p-3 bg-slate-50">
                <x-svg class="" svg="/icons/edit.svg#user"/>
            </div>
            <input class="p-2 bg-slate-50 placeholder:text-black" type="text" name="name" placeholder="username">
        </div>
        <div class="flex p-4">
            <div class="p-3 bg-slate-50">
                <x-svg class="" svg="/icons/edit.svg#password"/>
            </div>
            <input class="p-2 bg-slate-50 placeholder:text-black" type="password" name="password" placeholder="password">
        </div>
        <div class="p-4 flex justify-between">
            <input class="bg-green-500 p-2 hover:text-gray-100 text-gray-900 rounded-xl" type="submit" value="registration">
            <a class="p-2 text-slate-400 hover:text-slate-700" href="{{route('login')}}">Have already account?</a>
        </div>
    </form>
    <div class="bg-green-300 w-5"></div>
</div>
@endsection
