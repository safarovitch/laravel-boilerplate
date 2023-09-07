<x-app-layout>
    @prepend('css')
    <x-slot name="title">
        <h1 class="page-header-title">@lang('users.title')</h1>
    </x-slot>

    <x-slot name="buttons">

    </x-slot>

    <x-data-tables :table="$dataTables"/>

    @push('js')
    @endpush
</x-app-layout>