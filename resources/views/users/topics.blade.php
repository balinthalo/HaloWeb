<div hw-click-to-topic="{{$topic}}" class="cursor-pointer grid grid-cols-6 py-2 px-3 sm:w-4/5 md:w-2/3 lg:w-3/4 w-5/6 bg-slate-200 hover:bg-slate-300">
    <a class="col-span-2 break-all" href="{{route('post.index', $topic->id)}}">{{$topic->title}}</a>
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
