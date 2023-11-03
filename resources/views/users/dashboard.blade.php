@extends('components.base')
@section('content')
    <div class="grid grid-cols-6 mx-20 gap-10">
        <div>
            <div class="pt-12 px-12 pb-4 bg-slate-500 rounded-lg my-10 flex flex-col gap-4 items-center">
                <img class="rounded-xl" src="/images/profile.jpg" alt="profile">
                <a href="{{route('user.profile', $user)}}"><x-svg class="hover:stroke-blue-700 stroke-black" svg="/icons/edit.svg#edit"/></a>
                <div>{{$user->name}}</div>
            </div>
            <div class="grid grid-cols-2 gap-4 bg-slate-500 p-6 rounded-lg">
                <div class="grid flex-col gap-2">
                    <div class="flex gap-2">
                        <x-svg class="hover:stroke-blue-700 stroke-black" svg="/icons/edit.svg#email"/>
                        <p>{{auth()->user()->email}}</p>
                    </div>
                    <div class="flex gap-2">
                        <x-svg class="hover:stroke-blue-700" svg="/icons/edit.svg#password"/>
                        <p>&#x2022;&#x2022;&#x2022;&#x2022;&#x2022;&#x2022;&#x2022;&#x2022;</p>
                    </div>
                </div>
                <div class="grid gap-2 justify-self-end">
                    <a href="{{route('user.email')}}"><x-svg class="hover:stroke-blue-700 stroke-black" svg="/icons/edit.svg#edit"/></a>
                    <a href="{{route('user.password')}}"><x-svg class="hover:stroke-blue-700 stroke-black" svg="/icons/edit.svg#edit"/></a>
                </div>
            </div>
        </div>
        <div class="col-span-5 bg-slate-500 rounded-lg mt-10 p-6">
            {{date('Y-m-d')}}
        </div>
    </div>
@endsection
