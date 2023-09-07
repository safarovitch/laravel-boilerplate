<x-app-layout>
    @prepend('css')
    <x-slot name="title">
        <h1 class="page-header-title">{{ __('translations.title') }}</h1>
    </x-slot>
    <x-slot name="buttons">
        <button id="addLine" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#language-editor">
            <i class="bi bi-plus-circle"></i> @lang('translations.add_row')
        </button>
        <a href="{{ route('system.cache.clear') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-clockwise"></i> @lang('system.clear_cache')
        </a>
    </x-slot>

    <div class="row">
        <div class="col">
            <x-data-tables :table="$dataTables" :order="$dataOrder" :title="__('translations.title')" />
        </div>
    </div>

    <!-- Modal -->
    <div id="language-editor" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('translations.store') }}" method="POST" data-type="ajax">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">@lang("translations.create.title")</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text px-2" id="addon-group"
                                style="min-width: 100px">@lang('translations.group')</span>
                            <input type="text" class="form-control" name="group">
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text px-2" id="addon-key"
                                style="min-width: 100px">@lang('translations.key')</span>
                            <input type="text" class="form-control" name="key">
                        </div>
                        @foreach (config('app.site_locales') as $code => $locale)
                        @php
                        $translation = $line->text[$code] ?? '';
                        $flag = asset($locale['flag']);
                        @endphp
                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text px-2" id="addon-'.$code.'" style="min-width: 100px"><img
                                    src="{{ $flag }}" width="22" alt="{{ $locale['label'] }}" />&nbsp;&nbsp;{{
                                $locale['label'] }}</span>
                            <input type="text" class="form-control" name="text[{{$code}}]"
                                aria-describedby="basic-addon-'.$code.' value=" {{ $translation }}">
                        </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white"
                            data-bs-dismiss="modal">@lang('modal.close')</button>
                        <button type="submit" class="btn btn-primary">@lang('modal.save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    @section('js')
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function updateRow(input){
        var id = $(input).data('id');
        var value = $(input).val();
        var locale = $(input).data('code');
        var $column = $(input).parent().parent();
        var $row = $(input).closest('tr');

        
        $.ajax({
            url: "{{ route('translation.update') }}",
            type: 'POST',
            data: {
                id: id,
                value: value,
                locale: locale,
                _token: "{{ csrf_token() }}"
            },
            success: function(response){
                $column.find('.saved').removeClass('d-none');
                setTimeout(() => {
                    $column.find('.saved').addClass('d-none');
                }, 500);
            }
        });
    }

    $('form[data-type="ajax"]').submit(function(e){
        e.preventDefault();
        var $form = $(this);

        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: $form.serialize(),
            success: function(response){
                $('#language-editor').modal('hide');
                $('#table').DataTable().ajax.reload()
            }
        });
    });
    </script>
    @endsection
</x-app-layout>