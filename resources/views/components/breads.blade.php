@auth
{{--     <div class="flex flex-col sm:flex-row gap-4 p-4">
        @foreach (getBreadCrumbs() as $key => $breadcrumb)
        <a href="{{ $breadcrumb['url'] }}">
            <div class="rounded bg-slate-50 text-dark text-xl">
            {{ $breadcrumb['label'] }}
            </div>
        </a>
        @if ($key < count(getBreadCrumbs()) - 1)
            <span class="hidden sm:block">></span>
        @endif
        <a href="">
            <div>
                @if (isset($breadcrumb['parent']))
                {{$breadcrumb['parent']}}
                @endif
            </div>
        </a>
        @endforeach
    </div> --}}
    <div class="flex flex-col items-start py-2 px-4 gap-2">
        @if (Request::url() !== route('topic.index'))
            <button onclick="window.location = '/';" class="text-xl">Home</button>
        @endif
        <button onclick="history.back()" class="text-xl"> <<< Back </button>
    </div>
@endauth
