<x-app-layout>
    @prepend('css')
    <x-slot name="title">
        <h1 class="page-header-title">@lang('static_content_structure.page_title')</h1>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-success" form="contentForm">
            @isset($static_content_structure)
            <i class="bi bi-plus-circle"></i> @lang('static_content_structure.update')
            @else
            <i class="bi bi-plus-circle"></i> @lang('static_content_structure.store')
            @endisset
        </button>
    </x-slot>
    <form class="form" id="contentForm"
        action="@isset($static_content_structure) {{route('static_content_structure.update', $static_content_structure)}} @else {{route('static_content_structure.store')}} @endisset"
        method="POST">
        @isset($static_content_structure)
        {{method_field('PUT')}}
        @endisset
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group mb-4">
                            <label for="name">{{__('static_content_structure.form.name')}}</label>
                            <input type="text" name="name"
                                value="{{old('name', $static_content_structure->name ?? null)}}" class="form-control">
                        </div>

                        <div class="form-group mb-4">
                            <label for="name">{{__('static_content_structure.form.multiple')}}</label>
                            <div class="form-check form-switch mt-3">
                                <input class="form-check-input" name="multiple" type="checkbox" id="multiple"
                                    value="true" @if( old('multiple', $static_content_structure->multiple ?? null) )
                                checked="" @endif>
                                <label class="form-check-label" for="multiple"></label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-8">

                @isset($static_content_structure)

                <div class="card">
                    <div class="card-body">

                        <div class="form-group mb-4">
                            <h5>{{__("static_content_structure.partstitle")}}</h5>
                        </div>

                        <div data-repeater="">
                            <div data-repeater-list="structure_parts" id="add_part" class="">
                                @isset($static_content_structure)
                                @forelse ($static_content_structure->parts as $part)
                                <div data-repeater-item=""
                                    class="form-group d-flex flex-wrap gap-3 align-items-center mb-3">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>{{__("structure.form.partname")}}</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('structure_parts.'.$loop->index.'.name', $part->name) }}">
                                            <input type="hidden" class="form-control" name="id" value="{{ $part->id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>{{__("structure.form.parttype")}}</label>
                                            <select class="form-control" name="type">
                                                <option></option>
                                                @foreach (\App\Enums\StaticContentTypes::asArray() as $key => $type)
                                                <option value="{{$type}}" @if(old('structure_parts.'.$loop->
                                                    index.'.type',
                                                    $part->type ?? null) == $type) selected
                                                    @endif>{{__("content_part_type.".$key)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__("structure.form.options")}}</label>
                                            <input type="text" class="form-control" name="options"
                                                value="{{ old('structure_parts.'.$loop->index.'.options', $part->optionsAttribute) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group d-flex flex-col align-items-end">
                                            <label>&nbsp;</label>
                                            <button type="button" data-repeater-delete=""
                                                class="btn btn-sm btn-icon btn-danger"
                                                data-item-id="{{ $static_content_structure->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div data-repeater-item=""
                                    class="form-group d-flex flex-wrap gap-3 align-items-center mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__("structure.form.partname")}}</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__("structure.form.parttype")}}</label>
                                            <select class="form-control" name="type">
                                                <option></option>
                                                @foreach (\App\Enums\StaticContentTypes::asArray() as $key => $type)
                                                <option value="{{$type}}">{{__("content_part_type.".$key)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group d-flex flex-col align-items-end">
                                            <label>&nbsp;</label>
                                            <button type="button" data-repeater-delete=""
                                                class="btn btn-sm btn-icon btn-danger"
                                                data-item-id="{{ $static_content_structure->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforelse
                                @else
                                <div data-repeater-item=""
                                    class="form-group d-flex flex-wrap gap-3 align-items-center mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__("structure.form.partname")}}</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__("structure.form.parttype")}}</label>
                                            <select class="form-control" name="type">
                                                <option></option>
                                                @foreach (\App\Enums\StaticContentTypes::asArray() as $key => $type)
                                                <option value="{{$type}}">{{__("content_part_type.".$key)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group d-flex flex-col align-items-end">
                                            <label>&nbsp;</label>
                                            <button type="button" data-repeater-delete=""
                                                class="btn btn-sm btn-icon btn-danger"
                                                data-item-id="{{ $static_content_structure->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endisset
                            </div>
                            <button type="button" data-repeater-create="" class="btn btn-sm btn-primary mt-5">
                                <i class="bi bi-plus"></i> {{ __('repeater.add') }}
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endisset
    </form>
    @section('js')
    <script src="{{ asset('/vendor/formrepeater/formrepeater.bundle.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("[data-repeater]").repeater({
                initEmpty: !1,
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
                }
            });
        });
    </script>
    @endsection
</x-app-layout>