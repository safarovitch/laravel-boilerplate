<x-app-layout>
    @prepend('css')
    <x-slot name="title">
        <h1 class="page-header-title">@lang('service.title')</h1>
    </x-slot>

    <x-slot name="buttons">
        <a href="{{route('service.create')}}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> @lang('service.action_add')
        </a>
    </x-slot>

    <x-data-tables :table="$dataTables" />

    @push('js')
    @endpush
</x-app-layout>