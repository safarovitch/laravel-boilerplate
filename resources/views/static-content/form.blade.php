<x-app-layout>
    @prepend('css')
    <x-slot name="title">
        <h1 class="page-header-title">@lang('static_content.page_title')</h1>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-success" form="contentForm">
            @isset($static_content)
            <i class="bi bi-plus-circle"></i> @lang('static_content.update')
            @else
            <i class="bi bi-plus-circle"></i> @lang('static_content.store')
            @endisset
        </button>
    </x-slot>

    <form class="form" id="contentForm"
        action="@isset($static_content) {{route('static_content.update', $static_content)}} @else {{route('static_content.store')}} @endisset"
        method="POST">
        @isset($static_content)
        {{method_field('PUT')}}
        @endisset
        @csrf
        <div class="row">
            <div class="@if(isset($static_content) and $static_content->structure->multiple) col-lg-12 @else col-lg-10 offset-lg-1 @endif">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="name">{{__('static_content.form.name')}}</label>
                            <input type="text" name="name" value="{{old('name', $static_content->name ?? null)}}"
                                class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="slug">{{__('static_content.form.slug')}}</label>
                            <input type="text" name="slug" value="{{old('slug', $static_content->slug ?? null)}}"
                                class="form-control">
                        </div>
                        @isset($static_content)
                        <div class="form-group mb-4">
                            <label>{{__("static_content.form.structure")}}</label>
                            <p class="mb-0">
                                <a href="{{route('static_content_structure.edit',$static_content->structure)}}" target="_blank">{{$static_content->structure->name}} <i class="bi bi-box-arrow-up-right"></i></a>
                            </p>
                        </div>
                        @else
                        <div class="form-group mb-4">
                            <label>{{__("static_content.form.structure")}}</label>
                            <select class="form-control" name="structure_id">
                                <option></option>
                                @foreach ($structures as $structureName => $structureId)
                                <option value="{{$structureId}}" @if(old('structure_id', $static_content->structure_id
                                    ?? null) == $structureId) selected
                                    @endif>{{$structureName}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endisset
                        <div class="form-group mb-4">
                            <label for="active">{{__('static_content.form.status')}}</label>
                            <div class="form-check form-switch mt-3">
                                <input class="form-check-input" name="active" type="checkbox" id="multiple"
                                    value="true" @if( old('active', $static_content->active ?? null) )
                                checked="" @endif>
                                <label class="form-check-label" for="active"></label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="locale">{{__('static_content.form.locale')}}</label>
                            <select name="locale" class="form-control">
                                <option value=""></option>
                                @foreach (config('app.site_locales') as $code => $locale)
                                    <option value="{{$code}}" @if(old('locale', $static_content->locale ?? null) == $code ) selected @endif>{{$locale['label']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if(isset($static_content) and !$static_content->structure->multiple)
                    <div class="card-footer">
                        <div data-repeater="">
                            <div data-repeater-list="content_items" id="content_items" class="">
                                @forelse ( $static_content->items as $item )
                                <div data-repeater-item=""
                                    class="form-group d-flex flex-wrap gap-3 align-items-center mb-3">
                                    <div class="col-12">
                                        <x-content-structure :structure="$static_content->structure_id" :item="$item"/>
                                    </div>
                                </div>
                                @empty
                                <div data-repeater-item=""
                                    class="form-group d-flex flex-wrap gap-3 align-items-center mb-3">
                                    <div class="col-12">
                                        <x-content-structure :structure="$static_content->structure_id" />
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

            @if(isset($static_content) and $static_content->structure->multiple)
            <div class="mt-5">
                @isset( $static_content )
                <div data-repeater="">
                    <div data-repeater-list="content_items" id="content_items" class="row">
                        @forelse ( $static_content->items as $item )
                        <div data-repeater-item=""
                            class="form-group d-flex flex-wrap gap-3 align-items-center mb-3 col-12 col-md-6 col-lg-4">
                            <div class="col-12 h-100">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                        <strong>#{{$static_content->structure->name}}</strong>
                                            <button type="button" data-repeater-delete=""
                                                class="btn btn-sm btn-icon btn-danger"
                                                data-item-id="">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="id" class="form-control" value="{{$item->id}}">
                                        <x-content-structure :structure="$static_content->structure_id" :item="$item" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div data-repeater-item=""
                            class="form-group d-flex flex-wrap gap-3 align-items-center mb-3 col-12 col-md-6 col-lg-4">
                            <div class="col-12 h-100">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                        <strong>#{{$static_content->structure->name}}</strong>
                                            <button type="button" data-repeater-delete=""
                                                class="btn btn-sm btn-icon btn-danger"
                                                data-item-id="">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <x-content-structure :structure="$static_content->structure_id"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <button type="button" data-repeater-create="" class="btn btn-sm btn-primary mt-5">
                        <i class="bi bi-plus"></i> {{ __('repeater.add') }}
                    </button>

                </div>
                @endisset
            </div>
        </div>
        @endif

    </form>


    @section('js')
    <script src="{{ asset('/vendor/formrepeater/formrepeater.bundle.js')}}"></script>
    <script>
        $(document).ready(function(){
            $repeater = $("[data-repeater]").repeater({
                initEmpty: !1,
                repeaters: [{
                    // (Required)`enter code here`
                    // Specify the jQuery selector for this nested repeater
                    selector: '.inner-repeater'
                }],
                show: function() {
                    // $('[data-repeater-item]').find('[data-control="select2"]').select2();
                    $(this).find('[data-repeater-delete]').removeAttr('data-item-id');
                    count = $('[data-repeater-list]').find('[data-repeater-item]').length;
                    $(this).find('[id]').each((index,element) => {
                        id = $(element).attr('id');
                        $(element).attr('id', id + '-' + count);
                        if( $(element).data('bs-toggle') == 'tab'){
                            data_target = $(element).data('bs-target');
                            $(element).attr('data-bs-target', data_target + '-' + count);
                        }
                    });
                    $(this).find('input[data-part-id]').each(function(v,e){
                        $(e).val($(e).data('part-id'));
                    });
                    $(this).find('[data-image-selector] img').attr('src', 'https://via.placeholder.com/500x180&text=select image');
                }
            });
        });
    </script>

    <script>
        function popFileManager(button){
        event.preventDefault();
        $(button).attr("data-kt-indicator", "on");
        $(button).attr('data-filemanager', 'selecting');
        
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    }

    // set file link
    function fmSetLink($url) {
        button = $('button[data-filemanager="selecting"]');

        console.log(button);
        
        input = $(button).parent().find('input');
        image = $(button).parent().find('img');
        $(button).removeAttr('data-filemanager');

        $link = $url.replace('{{config("app.url")}}', '');

        $(input).val($link);
        $(image).attr('src', $url);
        $(button).attr("data-kt-indicator", "off");
    }
    </script>
    <style>
        .btn.indication[data-kt-indicator="off"] span.indicator-progress,.btn.indication[data-kt-indicator="on"] span.indicator-label{
            display: none
        }
        .btn.indication[data-kt-indicator="on"] span.indicator-progress,.btn.indication[data-kt-indicator="off"] span.indicator-label{
            display: block
        }
    </style>
    @endsection
</x-app-layout>