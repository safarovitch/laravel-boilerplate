<x-app-layout>
    @prepend('css')
    <x-slot name="title">
        <h1 class="page-header-title">@lang('system.backup.title')</h1>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-outline-success" data-type="ajax" data-route="{{route('system.backup.create')}}">@lang('system.backup.create')</button>
    </x-slot>

    <div class="row">
        @foreach ($backupList as $file)
            <div class="col">
                <!-- Card -->
                <div class="card card-bordered h-100 text-center py-3">
                    <div class="card-body">
                        <h5>
                            <i class="bi-server text-2xl mr-3"></i> 
                            {{ str_replace('.zip', '',str_replace(config('backup.backup.name').DIRECTORY_SEPARATOR, '', $file))}}
                        </h5>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        @endforeach
    </div>

    @push('js')
    @endpush
</x-app-layout>