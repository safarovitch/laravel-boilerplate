<x-app-layout>
    @section('css')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <style>
        .fm .fm-body{
            height: calc(100% - 90px)
        }
    </style>
    @endsection
    {{-- <x-slot name="title">
        <h1 class="page-header-title">@lang('system.filemanager.page_title')</h1>
    </x-slot> --}}

    <x-slot name="buttons">

    </x-slot>

    <div style="height: 88vh;">
        <div id="fm"></div>
    </div>

    @section('js')
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    @endsection
</x-app-layout>