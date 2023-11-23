@extends('components.base')
@section('content')

    <div class="flex items-center flex-col">
        <p class="w-1/2 text-2xl font-bold pb-2 break-all">{{$topic->title}}</p>
        <div class="w-full items-center flex flex-col my-10">

            <div class="flex flex-col items-end w-3/5 px-20">
                <div class="flex justify-end">
                    <a href="{{route("topic.create", ["parent_id" => $topic])}}" class="text-slate-50 gap-1 items-center flex px-3 py-2 mx-4 bg-green-500 rounded-xl hover:text-slate-950">
                        <div class="text-xl">+</div> Create new Topic
                    </a>
                    <a href="{{route("post.create", ["topic" => $topic])}}" class="text-slate-50 gap-1 items-center flex px-3 py-2 mx-4 bg-green-500 rounded-xl hover:text-slate-950">
                        <div class="text-xl">+</div> Create new Post
                    </a>
                </div>
            </div>

            @if (!$sub_topics->isEmpty())
                <div class="text-2xl my-4">Sub Topics</div>
                @foreach ($sub_topics as $topic)
                    <div hw-click-to-topic="{{$topic}}" class="cursor-pointer grid grid-cols-6 py-2 px-3 sm:w-4/5 md:w-2/3 lg:w-3/4 w-5/6 bg-slate-200 hover:bg-slate-300">
                        <a class="col-span-2" href="{{route('post.index', $topic->id)}}">{{$topic->title}}</a>
                        <a href="{{route('user.show', ['user_id' => $topic->user->id])}}" class="flex gap-2 justify-self-end">
                            <div>
                                @include('layouts.profile', ['user' => $topic->user, 'class' => 'rounded-full w-[20px] h-[20px] mt-3'])
                            </div>
                            <div class="pt-2 break-all">by {{$topic->user->name}}</div>
                        </a>
                        <div class="justify-self-end">
                            <div>Posts {{$topic->posts->count()}}</div>
                            <div>Topic {{$topic->where('parent_id', $topic->id)->count()}}</div>
                        </div>
                        <div class="justify-self-end pt-2">
                            @include('components.date', ['data' => $topic])
                        </div>
                        @if (auth()->user()->id === 1 || $topic->user->id == auth()->user()->id)
                            <div class="flex justify-end">
                                <form class="" action="{{route('topic.delete', $topic->id)}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE')}}
                                    <button class="py-1">
                                        <x-svg class="hover:stroke-red-700 stroke-black" svg="/icons/edit.svg#trashcan" width="30px" height="30px"/>
                                    </button>
                                </form>
                                <form class="" action="{{route('topic.edit', $topic->id)}}">
                                    <button class="pt-1 px-2">
                                        <x-svg class="hover:stroke-blue-700 stroke-black" svg="/icons/edit.svg#edit" width="24px" height="24px"/>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif

            @if (!$posts->isEmpty())
                <div class="text-2xl my-4">Posts</div>
                @foreach ($posts as $post)
                    <div hw-click-to-topic="{{$post}}" class="cursor-pointer grid grid-cols-6 sm:w-4/5 md:w-2/3 lg:w-3/4 w-5/6 bg-slate-200 hover:bg-slate-300 shadow-lg py-2 px-3">
                        <a class="col-span-2" href="{{route('post.show', ["post" => $post->id, "topic" => $post->topic->id])}}">
                            <p class="text-lg font-medium">{{$post->title}}</p>
                            <p class="pl-4">{{Str::limit($post->text, 30, '...')}}</p>
                        </a>
                        <a href="{{route('user.show', ['user_id' => $post->user->id])}}" class="flex gap-2 justify-self-end">
                            <div>
                                @include('layouts.profile', ['user' => $topic->user, 'class' => 'rounded-full w-[20px] h-[20px] mt-3'])
                            </div>
                            <div class="pt-2"> by {{$post->user->name}} </div>
                        </a>
                        <div class="justify-self-end pt-2">Comments {{$post->comments->count()}}</div>
                        <div class="justify-self-end pt-2">
                            @include('components.date', ['data' => $post])
                        </div>
                        @if (auth()->user()->id === 1 || $post->user->id == auth()->user()->id)
                            <div class="flex justify-end">
                                <form action="{{route('post.delete', ["post" => $post->id, "topic" => $topic->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="py-1">
                                        <x-svg class="hover:stroke-red-700 stroke-black" svg="/icons/edit.svg#trashcan" width="30px" height="30px"/>
                                    </button>
                                </form>
                                <a class="" href="{{ route('post.edit', ["post" => $post->id, "topic" => $topic->id]) }}">
                                    <button class="pt-1 px-2">
                                        <x-svg class="hover:stroke-blue-700 stroke-black" svg="/icons/edit.svg#edit" width="24px" height="24px"/>
                                    </button>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
