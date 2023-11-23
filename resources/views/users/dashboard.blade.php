@extends('components.base')
@section('content')
    <div class="grid grid-cols-6 mx-20 gap-10">
        <div class="flex flex-col items-center">
            <div class="p-8 w-60 bg-slate-500 rounded-lg m-10 flex flex-col gap-4 items-center">
                    @if($user->id == auth()->user()->id)
                        <a class="flex flex-col items-center group" href="{{route('user.profile', $user)}}">
                            @include('layouts.profile', ['user' => $user, 'class' => 'group-hover:opacity-75 rounded-xl h-40 w-40'])
                            <div class="absolute pt-16 hidden group-hover:block">
                                <x-svg class="hover:stroke-blue-700 stroke-black" svg="/icons/edit.svg#edit"/>
                            </div>
                        </a>
                    @else
                        <div class="flex flex-col items-center group">
                            @include('layouts.profile', ['user' => $user, 'class' => 'rounded-xl h-40 w-40'])
                        </div>
                    @endif
            </div>
            @if($user->id == auth()->user()->id)
                <a href="{{route('user.password')}}" class="rounded-lg group">
                    <div class="grid grid-col w-60 gap-4 bg-slate-500 p-6 rounded-lg group-hover:opacity-25">
                        <div class="break-all justify-self-center">{{$user->name}}</div>

                        <div class="grid grid-cols gap-2">
                            <div class="grid grid-cols-12 gap-2">
                                <x-svg class="col-span-2" svg="/icons/edit.svg#email"/>
                                <p class="col-span-10 break-all">{{$user->email}}</p>
                            </div>
                            <div class="grid grid-cols-12 gap-2">
                                <x-svg class="col-span-2" svg="/icons/edit.svg#password"/>
                                <p class="col-span-10">&#x2022;&#x2022;&#x2022;&#x2022;&#x2022;&#x2022;&#x2022;&#x2022;</p>
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-col items-center">
                            <div class="absolute -mt-28 hidden group-hover:block">
                                <x-svg class="hover:stroke-blue-700 stroke-black" svg="/icons/edit.svg#edit"/>
                            </div>
                    </div>
                </a>
            @else
                <div class="grid grid-col w-60 gap-4 bg-slate-500 p-6 rounded-lg">
                    <div class="break-all justify-self-center">{{$user->name}}</div>
                </div>
            @endif
        </div>
        <div class="col-span-5 bg-slate-500 rounded-lg my-10 p-6">
            @if ($user->topics->count() != 0)
                <div class="py-4">
                    <div class="text-2xl">User topics</div>
                    <div class="flex flex-col items-center py-4">
                        @foreach ($user->topics as $topic)
                            @include('users.topics', ['topic' => $topic])
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($user->posts->count() != 0)
                <div class="py-4">
                    <div class="text-2xl">User posts</div>
                    <div class="flex flex-col items-center py-4">
                        @foreach ($user->posts as $post)
                            @include('users.posts', ['post' => $post])
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($user->comments->count() != 0)
                <div class="py-4">
                    <div class="text-2xl">User comments</div>
                    <div class="flex flex-col items-center py-4">
                        @foreach ($user->comments as $comment)
                            @include('users.comments', ['comment' => $comment])
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($user->topics->count() == 0 && $user->posts->count() == 0 && $user->comments->count() == 0)
                <div class="flex justify-center mt-10 text-lg">
                    This user has no any social activity yet!
                </div>
            @endif
        </div>
    </div>
@endsection
