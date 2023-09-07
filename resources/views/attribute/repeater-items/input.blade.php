<style>
    .svg-icon>svg rect {
        fill: #fff;
    }

    .svg-icon>svg {
        width: 1.75rem;
        height: 1.75rem;
    }
</style>
<!--begin::Repeater-->
<div data-repeater="">
    <!--begin::Form group-->
    <div class="form-group">
        <div data-repeater-list="attribute_options" id="add_attribute_option" class="d-flex flex-column gap-3">
            @if (isset($attribute) && $attribute->options()->count() > 0)
                @foreach ($attribute->options as $option)
                    <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5 align-items-center">
                        <div class="col-12">
                            @if(count(config('app.site_locales'))>1)
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab-{{$option->id}}" role="tablist">
                                    @foreach (config('app.site_locales') as $code => $locale)
                                    <button class="nav-link @if($loop->index == 0) active @endif" id="nav-tab-{{$option->id}}-{{$code}}"
                                        data-bs-toggle="tab" data-bs-target="#nav-{{$option->id}}-{{$code}}" type="button" role="tab"
                                        aria-controls="nav-{{$option->id}}-{{$code}}" aria-selected="true"><span class="d-flex"><img
                                                src="{{asset($locale['flag'])}}" width="14" class="mr-2">
                                            {{$locale['label']}}</span></button>
                                    @endforeach
                                </div>
                            </nav>
                            @endif
                            <div class="tab-content" id="nav-tabContent-{{$option->id}}">
                                @foreach (config('app.site_locales') as $code => $locale)
                                <div class="tab-pane fade @if($loop->index == 0) active show @endif" id="nav-{{$option->id}}-{{$code}}"
                                    role="tabpanel" aria-labelledby="nav-tab-{{$option->id}}-{{$code}}">
                                    <div class="row">
                                    <!--begin::Input-->
                                    <div class="col">
                                        <input type="text" class="form-control mw-100 w-200px" name="value"
                                            placeholder="Option value" value="{{ $option->value }}"/>
                                    </div>
                                    <!--end::Input-->
                                    <div class="col-md-2">
                                        <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-danger"
                                            data-item-id="{{ $option->id }}">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2"
                                                        rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                                                    <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                                        transform="rotate(45 8.46447 7.05029)" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                    </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
                    <div class="col-12">
                        @if(count(config('app.site_locales'))>1)
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach (config('app.site_locales') as $code => $locale)
                                <button class="nav-link @if($loop->index == 0) active @endif" id="nav-option-tab-{{$code}}"
                                    data-bs-toggle="tab" data-bs-target="#nav-option-{{$code}}" type="button" role="tab"
                                    aria-controls="nav-{{$code}}" aria-selected="true"><span class="d-flex"><img
                                            src="{{asset($locale['flag'])}}" width="14" class="mr-2">
                                        {{$locale['label']}}</span></button>
                                @endforeach
                            </div>
                        </nav>
                        @endif
                        <div class="tab-content" id="nav-tab-option-content">
                            @foreach (config('app.site_locales') as $code => $locale)
                                <div class="tab-pane fade @if($loop->index == 0) active show @endif" id="nav-option-{{$code}}"
                                    role="tabpanel" aria-labelledby="nav-tab-option-{{$code}}">
                                    <div class="row">
                                        <!--begin::Input-->
                                        <div class="col">
                                            <!--end::Input-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control mw-100 w-200px" name="value"
                                                placeholder="Option value" />
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-2">
                                            <!--end::Input-->
                                            <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-danger">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="7.05025" y="15.5356" width="12"
                                                            height="2" rx="1" transform="rotate(-45 7.05025 15.5356)"
                                                            fill="black" />
                                                        <rect x="8.46447" y="7.05029" width="12" height="2"
                                                            rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group mt-5">
        <button type="button" data-repeater-create="" class="btn btn-sm btn-primary">
            {{ __('main.add_another_option') }}
        </button>
    </div>
    <!--end::Form group-->
</div>
<!--end::Repeater-->
<script>
    
    $('[data-parent]').hide();
    $(document).delegate('[data-hasoptionchild]', 'change', function() {
        var parent = $(this).closest('[data-repeater-item]');
        field_name = $(parent).find('[data-parent]').attr('name');
        $(parent).find('[data-parent]').attr('disabled', true);
        var type = $(this).val();
        $(parent).find('[data-parent]').hide();
        $(parent).find('[data-parent="' + type + '"]').show();
        $(parent).find('[data-parent="' + type + '"]').removeAttr('disabled');
    });
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

        $link = $url.replace('{{config("app.url")}}/storage/', '');

        $(input).val($link);
        $(image).attr('src', $url);
        $(button).attr("data-kt-indicator", "off");
    }

    @if( isset($attribute) && isset($attribute->options) && $attribute->options()->count() > 1 )
    $(document).delegate('[data-repeater-delete][data-item-id]', 'click', function() {
        var itemId = $(this).data('item-id');
        var url = "attribute/{{$attribute->id}}/option/"+itemId+"/delete";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                if (data.success) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
            },
            error: function(data) {
                toastr.error(data.message);
            }
        });
    });

    @foreach($attribute->options as $option)
        @if(old('type', $option->type ?? null) != null)
            $('[data-hasoptionchild]').trigger('change');
        @endif
    @endforeach
    @endif
</script>
