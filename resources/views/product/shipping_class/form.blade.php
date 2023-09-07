@section('css')
@prepend('css')
@endsection
<x-app-layout>
    <x-slot name="title">
        <h1 class="page-header-title">@lang('shipping_class.title')</h1>
    </x-slot>

    <form
        action="@isset($shippingClass){{route('shipping_class.update', $shippingClass)}}@else{{route('shipping_class.store')}}@endisset"
        method="POST">
        @csrf
        @isset($shippingClass)
        @method('PUT')
        @endisset
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
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
                        <div class="tab-content mt-3" id="nav-tabContent">
                            @foreach (config('app.site_locales') as $code => $locale)
                            <div class="tab-pane fade @if($loop->index == 0) active show @endif" id="nav-{{$code}}"
                                role="tabpanel" aria-labelledby="nav-tab-{{$code}}">



                                <div class="form-group">
                                    <label for="title">@lang('shippingClass.title')</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{old('title', $shippingClass->title ?? '')}}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="description">@lang('shippingClass.description')</label>
                                    <textarea name="description" id="description"
                                        class="form-control">{{old('description', $shippingClass->description ?? '')}}</textarea>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group mt-3">
                            <label for="condition">@lang('shippingClass.condition')</label>
                            <textarea name="condition" id="condition"
                                class="form-control">{{old('condition', $shippingClass->condition ?? '')}}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="cost">@lang('shippingClass.cost')</label>
                            <input type="text" name="cost" id="cost" class="form-control"
                                value="{{old('cost', $shippingClass->cost ?? '')}}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>