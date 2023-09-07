<x-app-layout>
    @prepend('css')
    <x-slot name="title">
        <h1 class="page-header-title">@lang('static_content.title')</h1>
    </x-slot>

    <x-slot name="buttons">
        <a href="{{route('static_content.create')}}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> @lang('static_content.action_create')
        </a>
    </x-slot>

    <x-data-tables :table="$dataTables"/>

    @push('js')
    @endpush
</x-app-layout>