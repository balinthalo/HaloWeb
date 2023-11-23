<div class="bg-slate-300 w-1/2 my-2 px-4 ml-4 py-4 flex-col shadow-lg">
    <div class="flex">
        <div class="px-6 pt-2 flex flex-col items-center gap-1">
            <a href="{{route('user.show', ['user_id' => $comment->user->id])}}" class="flex flex-col items-center">
                @include('layouts.profile', ['user' => $comment->user, 'class' => 'rounded-3xl w-[100px] h-[100px] mt-3'])
                <div>{{$comment->user->name}}</div>
            </a>
            <div>
                @if (\Carbon\Carbon::parse($comment->created_at)->diffInDays(\Carbon\Carbon::now(), false) < 7)
                {{date('l', strtotime($comment->created_at))}}
                @else
                    {{date('Y m.d.', strtotime($comment->created_at))}}
                @endif
            </div>
        </div>
        <a href="{{route('post.show', ['post' => $comment->post->id, 'topic' => $comment->post->topic->id])}}" class="pt-3 w-4/5 break-all whitespace-pre-wrap">{{$comment->text}}
        </a>
        @if (auth()->user()->id === 1 || $comment->user->id == auth()->user()->id)
            <form class="flex items-end" action="{{route('comment.delete', ['post' => $comment->post->id, 'topic' => $comment->post->topic->id, 'comment' => $comment->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <input class="hover:text-red-700/90" type="submit" value="DEL">
            </form>
        @endif

    </div>
</div>
