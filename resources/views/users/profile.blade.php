@extends('components.base')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <div class="gap-4 bg-slate-100 group">
            <div class="flex justify-center">
                <div class="absolute">
                    @if (auth()->user()->profile_picture === NULL)
                        <img id="profile" src="/images/profile.jpg" alt="profile" class="object-fill h-64 w-full z-0 group-hover:opacity-75 rounded-lg">
                    @else
                        <img id="profile" src="/images/{{$user->profile_picture}}" alt="profile2" class="object-fill h-64 w-full z-0 group-hover:opacity-75 rounded-lg">
                    @endif
                    <div id="display" class="z-10 object-fill h-64 w-full group-hover:opacity-75 rounded-lg"></div>
                </div>
            </div>
            <div class="relative z-20">
                <form action="{{route('user.update_profile', auth()->user())}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 items-center justify-center w-full">
                    @csrf
                    {{method_field('PUT')}}
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full px-4 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:opacity-95">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input name="image" id="dropzone-file" type="file" class="hidden"/>
                    </label>
                    <div id="out"></div>
                    <div class="flex gap-4">
                        <button class="bg-green-700 py-2 px-5 rounded-xl hover:fill-slate-950 fill-slate-50" type="submit"><x-svg svg="/icons/edit.svg#upload"/></button>
                        <div class="bg-red-700 py-2 px-5 rounded-xl cursor-pointer hover:stroke-slate-950 stroke-slate-50" onclick="dismiss()"><x-svg svg="/icons/edit.svg#escape"/></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
