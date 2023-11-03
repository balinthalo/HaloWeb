@extends('components.base')
@section('content')
    <div class="flex flex-col mt-10 items-end w-4/5 px-20">
        <a href="{{route("topic.create")}}" class="gap-1 items-end flex px-3 py-2 mx-4 bg-green-500 rounded-xl text-slate-50 hover:text-slate-950"><div class="text-xl">+</div>Create new</a>
    </div>
    <div class="flex flex-col items-center mt-5 text-lg">
        @foreach ($topics as $topic)
            <div class="grid grid-cols-6 sm:w-4/5 md:w-2/3 lg:w-3/4 w-5/6 shadow-lg bg-slate-200 hover:bg-slate-300">
                <div class="flex gap-2 py-2 px-3 break-all col-span-2">
                    <a href="{{route('post.index', $topic->id)}}">{{$topic->title}}</a>
                </div>
                <a href="{{route('user.show', ['user' => $topic->user, 'user_id' => $topic->user->id])}}" class="justify-self-end flex gap-2 py-2 px-3 break-all col-span-1">
                    <div class="pt-3">
                        <img src="/images/profile.jpg" alt="profile" width="20" height="20" class="rounded-full">
                    </div>
                    <div class="pt-2">by {{$topic->user->name}}</div>
                </a>
                <div class="py-2 px-3 justify-self-end">
                    <div>Posts {{$topic->posts->count()}}</div>
                    <div>Topics {{$topic->where('parent_id', $topic->id)->count()}}</div>
                </div>
                <div class="py-4 px-3 justify-self-end">
                    @if (\Carbon\Carbon::parse($topic->created_at)->diffInDays(\Carbon\Carbon::now(), false) < 7)
                        {{date('l', strtotime($topic->created_at))}}
                    @else
                        {{date('Y M.d.', strtotime($topic->created_at))}}
                    @endif
                </div>
                @if (auth()->user()->id === 1 || $topic->user_id === auth()->user()->id)
                    <div class="flex flex-col py-4 px-3 justify-self-end">
                        <div class="flex gap-2 justify-end">
                            <form action="{{route('topic.delete', $topic->id)}}" method="post">
                                @csrf
                                {{ method_field('DELETE')}}
                                <button class="py-1">
                                    <x-svg class="hover:stroke-red-700 stroke-black" svg="/icons/edit.svg#trashcan" width="30px" height="30px"/>
                                </button>
                            </form>
                            <form action="{{route('topic.edit', $topic->id)}}">
                                <button class="pt-1 px-2">
                                    <x-svg class="hover:stroke-blue-700 stroke-black" svg="/icons/edit.svg#edit" width="24px" height="24px"/>
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
        <div class="py-10 px-10 bg-slate-200 lg:w-3/4 w-1/2 mb-10 shadow-lg">
            {{$topics->links('pagination::tailwind')}}
        </div>
    </div>
@endsection
