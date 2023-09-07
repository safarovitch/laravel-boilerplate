@section('css')
@prepend('css')
@endsection
<x-app-layout>
    <x-slot name="title">
        <h1 class="page-header-title">@lang('brand.title')</h1>
    </x-slot>

    <form action="@isset($brand){{route('brand.update', $brand)}}@else{{route('brand.store')}}@endisset" method="POST" data-type="ajax">
        @csrf
        @isset($brand)
        @method('PUT')
        @endisset
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="logo">@lang('brand.logo')</label>
                                <x-slim-cropper :image="$brand->logo ?? null" field="logo"
                                    :size="\App\Enums\ImageSize::BRAND_ICON_IMAGE_SIZE" />
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">@lang('brand.name')</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{old('name', $brand->name ?? '')}}">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="description">@lang('brand.description')</label>
                                    <textarea name="description" id="description"
                                        class="form-control">{{old('description', $brand->description ?? '')}}</textarea>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group mt-3">
                            <label for="catalog">@lang('brand.catalog')</label>
                            <x-file-upload field="catalog" :model="$brand ?? null" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="owner_manual">@lang('brand.owner_manual')</label>
                            <x-file-upload field="owner_manual" :model="$brand ?? null" />
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
        <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
            <!-- Card -->
            <div class="card card-sm bg-dark border-dark mx-2">
                <div class="card-body">
                    <div class="row justify-content-center justify-content-sm-between">
                        <div class="col">
                            <button type="button" class="btn btn-ghost-danger">@lang('action.delete')</button>
                        </div>
                        <!-- End Col -->
                        <div class="col-auto">
                            <div class="d-flex gap-3">
                                <button type="button" class="btn btn-ghost-light">@lang('action.discard')</button>
                                <button type="submit" class="btn btn-primary">@lang('action.save')</button>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </div>
    </form>
</x-app-layout>