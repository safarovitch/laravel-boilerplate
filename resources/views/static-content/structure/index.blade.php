<x-app-layout>
    @prepend('css')
    <x-slot name="title">
        <h1 class="page-header-title">@lang('static_content_structure.title')</h1>
    </x-slot>

    <x-slot name="buttons">
        <a href="{{route('static_content_structure.create')}}" class="btn btn-secondary">
            <i class="bi bi-plus-circle"></i> @lang('static_content_structure.action_create')
        </a>
    </x-slot>

    <x-data-tables :table="$dataTables"/>

    @push('js')
    @endpush
</x-app-layout>