@if($variation->options()->count())
    @foreach( $variation->options as $variation )
        @include('parts.product.variation-options', [
        'variation' => $variation
        ])
    @endforeach
@endif

@if( $variation->parent != null)
    @if($variation->parent->parent == null)
        <div>{{ $variation->parent->name }} - {{ $variation->name }}- {{ $variation->id}}</div>
    @else
        <div>{{ $variation->name }} - {{ $variation->id}}</div>
    @endif
@else
    <div>{{ $variation->name }} - {{ $variation->id}}</div>
@endif