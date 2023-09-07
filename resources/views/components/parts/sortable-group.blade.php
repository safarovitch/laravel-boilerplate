<div class="js-sortable list-group" data-hs-sortable-options='{
    "animation": 150,
    "group": "{{$id}}",
    "fallbackOnBody": true
  }'>
    @if($items)
    @foreach ($items as $item)
    @if( $item->hasChildren() )
    <div class="list-group-item">
        <h4 class="h5">
            <i class="sortablejs-custom-handle bi-grip-horizontal list-group-icon"></i>
            {{ $item->name }}
        </h4>
        @include('components.parts.sortable-group', ['items' => $item->children])
    </div>
    @else
    <div class="list-group-item">
        <i class="sortablejs-custom-handle bi-grip-horizontal list-group-icon"></i> {{ $item->name }}
    </div>
    @endif
    @endforeach
    @else
    <div class="list-group-item">@lang('blog.categories.no_categories')</div>
    @endif
</div>