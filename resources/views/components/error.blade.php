@if($errors)
@foreach ($errors->all() as $error)
    <div class="px-2 py-1 w-full bg-red-500/90 text-white">
        {{$error}}
    </div>
@endforeach
@endif
