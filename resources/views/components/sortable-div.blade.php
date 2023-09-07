@push('css')
<link rel="stylesheet" href="{{ asset('css/slim.css') }}">
@endpush
<div>
    @include('components.parts.sortable-group', ['items' => $items, 'id' => $id])
</div>
@push('js')
<script src="{{asset('vendor/sortablejs/Sortable.min.js')}}"></script>
<script>
    $(document).ready(function() {
        HSCore.components.HSSortable.init('.js-sortable')
    });
</script>
@endpush