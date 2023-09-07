<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    @push('css')
    <link href="{{ asset('css/tree.css') }}" rel="stylesheet">
    @endpush
    <div class="card-body-height">
        {!! $services !!}
    </div>
    @push('js')
    <script src="{{ asset('js/tree.js') }}"></script>
    <script>
        $(document).ready(function() {
	    $('.slectableTree').tree();

        $('.slectableTree input').on('change', function() {
            var checked = $(this).prop('checked');
            var id = $(this).data('id');
            if( checked )
                $('.slectableTree input[data-id='+id+']').prop('checked', checked);
            else
                $('.slectableTree input[data-id='+id+']').removeAttr('checked');
        })
	});
    </script>
    @endpush
</div>