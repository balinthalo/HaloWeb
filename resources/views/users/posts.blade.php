<div hw-click-to-topic="{{$post}}" class="cursor-pointer grid grid-cols-6 sm:w-4/5 md:w-2/3 lg:w-3/4 w-5/6 bg-slate-200 hover:bg-slate-300 shadow-lg py-2 px-3">
    <a class="col-span-2" href="{{route('post.show', ["post" => $post->id, "topic" => $post->topic->id])}}">
        <p class="text-lg break-all font-medium">{{$post->title}}</p>
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
