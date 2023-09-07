<!--begin::Repeater-->
<div data-repeater="">
    <!--begin::Form group-->
    <div class="form-group">
        <div data-repeater-list="variation_option" id="product_varitations" class="d-flex flex-column gap-2">
            @if( $attributes->count() > 1)
            @foreach( $attributes->last()->variations as $p_variation )
            @foreach( $attributes->first()->variations as $c_variation )
            <div data-repeater-item="" class="row border p-2 bg-light">
                <input type="hidden" name="variation-parent_id" value="{{ $p_variation->id }}">
                <input type="hidden" name="variation-id" value="{{ $c_variation->id }}">
                <div class="col-4">
                    <p class="form-control form-control-sm">
                        &bullet;{{ $p_variation->label}}<br>
                        &bullet;{{ $c_variation->label}}
                    </p>
                </div>
                <div class="col-2">
                    <input class="form-control form-control-sm col-6" type="number" step="1" placeholder="Stock" name="variation-stock">
                </div>
                <div class="col-5 d-flex">
                    <input class="form-control form-control-sm" type="hidden" placeholder="Image" name="variation-value">
                    <button class="img-fluid form-control mw-175px" type="button" onclick="popFileManager(this)">
                        <i class="fa fa-image"></i><img src="" class="w-100" alt="">
                    </button>
                </div>
                <!--end::Input-->
                <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
            </div>
            @endforeach
            @endforeach
            @else
            @foreach( $attributes->first()->variations as $c_variation )
            <div data-repeater-item="" class="row border p-2 bg-light">
                <div class="col-4">
                    <input type="hidden" name="variation-id" value="{{ $c_variation->id }}">
                    <p class="form-control form-control-sm">
                        &bullet;{{ $c_variation->label}}
                    </p>
                </div>
                <div class="col-2">
                    <input class="form-control form-control-sm col-6" type="number" step="1" placeholder="Stock" name="variation-stock">
                </div>
                <div class="col-5 d-flex">
                    <input class="form-control form-control-sm" type="hidden" placeholder="Image" name="variation-image">
                    <button class="img-fluid form-control mw-175px" type="button" onclick="popFileManager(this)">
                        <i class="fa fa-image"></i><img src="" class="w-100" alt="">
                    </button>
                </div>
                <!--end::Input-->
                <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<script>
    $("[data-repeater]").repeater({
        initEmpty: !1,
        show: function() {
            $('[data-repeater-item]').find('[data-control="select2"]').select2();
            $(this).find('[data-repeater-delete]').removeAttr('data-item-id');
        }
    });

    function popFileManager(button){
        
        event.preventDefault();
        $(button).attr('data-filemanager', 'selecting');
        console.log("Loading image")
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    }

    // // set file link
    // function fmSetLink($url) {
    //     button = $('button[data-filemanager="selecting"]');
    //     input = $(button).parent().find('input');
    //     preview = $(button).find('img');
        
    //     preview.prop('src', $url);

    //     $(input).val($url.replace('{{config("app.url")}}/storage/', ''));
    //     $(button).attr('data-filemanager', 'false');
    // }

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
</script>