<x-app-layout>
    <x-slot name="title">
        <h1 class="page-header-title">@lang('service.title')</h1>
    </x-slot>
    <form action="@isset($service){{route('service.update', $service)}}@else{{route('service.store')}}@endisset"
        method="POST" data-type="ajax">
        @isset($service)
        @method('PUT')
        @endisset
        @csrf
        <div class="row">
            <div class="col-12 col-lg-5 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    @if(count(config('app.site_locales'))>1)
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach (config('app.site_locales') as $code => $locale)
                            <button class="nav-link @if($loop->index == 0) active @endif" id="nav-tab-{{$code}}"
                                data-bs-toggle="tab" data-bs-target="#nav-{{$code}}" type="button" role="tab"
                                aria-controls="nav-{{$code}}" aria-selected="true"><span class="d-flex"><img
                                        src="{{asset($locale['flag'])}}" width="14" class="mr-2">
                                    {{$locale['label']}}</span></button>
                            @endforeach
                        </div>
                    </nav>
                    @endif
                    <div class="tab-content" id="nav-tabContent">
                        @foreach (config('app.site_locales') as $code => $locale)
                        <div class="tab-pane fade @if($loop->index == 0) active show @endif" id="nav-{{$code}}"
                            role="tabpanel" aria-labelledby="nav-tab-{{$code}}">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">@lang('service.content')</h4>
                            </div>
                            <!-- End Header -->
                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="title" class="form-label">@lang('service.name')</label>
                                    <input type="text" class="form-control" name="name[{{$code}}]" id="name"
                                        autocomplete="text"
                                        value="{{old('name.'.$code, isset($service) ? $service->getTranslation('name', $code) : null )}}">
                                </div>
                                <div class="mb-4">
                                    <label for="title" class="form-label">@lang('service.description')</label>
                                    <textarea type="text" class="form-control" name="description[{{$code}}]"
                                        id="description"
                                        autocomplete="text">{{old('description.'.$code, isset($service) ? $service->getTranslation('description', $code) : null )}}</textarea>
                                </div>
                                <!-- End Form -->
                            </div>
                            <!-- Body -->
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Card -->
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
    <!-- End Content -->
</x-app-layout>

@csrf

@section('js')
@endsection