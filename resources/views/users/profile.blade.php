@extends('components.base')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <div class="gap-4 bg-slate-100">
            <div class="flex justify-center">
                @if (auth()->user()->profile_picture === NULL)
                    <img id="profile" src="/images/profile.jpg" alt="profile">
                @else
                    <img id="profile" src="/images/{{$user->profile_picture}}" alt="profile2">
                @endif
            </div>
            <div id="asd">a</div>
            <div>
                <form class="flex gap-4 flex-col items-center my-8" action="{{route('user.update_profile', auth()->user())}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <input type="file" name="image" id="imgInput">
                    <button class="bg-green-700 w-20" type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
@endsection
