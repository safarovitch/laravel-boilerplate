@push('css')
<link href="{{ asset('css/tree.css') }}" rel="stylesheet">
@endpush
<div class="card-body-height">
    {!! $categories !!}
</div>
@push('js')
<script src="{{ asset('js/tree.js') }}"></script>
<script>
    $(document).ready(function() {
	    $('.categoryTree').tree();

        $('.categoryTree input').on('change', function() {
            var checked = $(this).prop('checked');
            var id = $(this).data('id');
            if( checked )
                $('.categoryTree input[data-id='+id+']').prop('checked', checked);
            else
                $('.categoryTree input[data-id='+id+']').removeAttr('checked');
        })
	});
</script>
@endpush