@foreach ($menu as $item)

@if(isset($item['url']))

<div class="nav-item">
    @if( isset($item['children']) )
    <a class="nav-link dropdown-toggle @if(in_array_r(request()->fullUrl(), $item['children'])) active @endif" href="#navbarItem-{{$loop->index}}" role="button"
        data-bs-toggle="collapse" data-bs-target="#navbarItem-{{$loop->index}}" aria-expanded="true"
        aria-controls="navbarItem-{{$loop->index}}">
        <i class="nav-icon {{$item['icon']}}"></i>
        <span class="nav-link-title">{{$item['title']}}</span>
    </a>
    <div id="navbarItem-{{$loop->index}}" class="nav-collapse collapse @if(in_array_r(request()->fullUrl(), $item['children'])) show @endif"
        data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">
        @foreach ($item['children'] as $child)
        <a class="nav-link @if(request()->fullUrl() == $child['url']) active @endif" href="{{ $child['url'] }}">
            {{-- <i class="nav-icon {{$child['icon']}}"></i> --}}
            {{$child['title']}}
        </a>
        @endforeach
    </div>
    @else
    <a class="nav-link @if(request()->fullUrl() == $item['url']) active @endif" href="{{$item['url']}}">
        <i class="nav-icon {{$item['icon']}}"></i>
        <span class="nav-link-title">{{$item['title']}}</span>
    </a>
    @endif
</div>

@else

<span class="dropdown-header mt-4">{{$item['title']}}</span>
<small class="bi-three-dots nav-subtitle-replacer"></small>

@endif
@endforeach