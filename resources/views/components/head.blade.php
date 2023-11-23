@auth
    <div class="bg-gray-400 py-2 px-6 grid grid-cols-2">
        <a href="{{route('user.show', ['user_id' => auth()->user()->id])}}" class="grid justify-self-start">
            @include('layouts.profile', ['user' => auth()->user(), 'class' => 'rounded-full w-[30px] h-[30px] cursor-pointer'])
        </a>
        <div class="grid justify-self-end">
            <a href="{{route('logout')}}">Log out</a>
        </div>
    </div>
@endauth
