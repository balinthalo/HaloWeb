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
    @if (Request::url() !== route('topic.index'))
        <button onclick="history.back()" class="px-4 py-2 text-xl"> <<< Back </button>
    @endif

@endauth
