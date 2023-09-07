<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    @if( $part->type == \App\Enums\StaticContentTypes::TEXT )
    <div class="form-group mb-3">
        <label for="{{Str::slug($part->name)}}">{{$part->name}}</label>
        <input type="text" name="value" id="{{Str::slug($part->name)}}" class="form-control" value="@isset($item){{$item->value}}@endisset">
    </div>
    @elseif( $part->type == \App\Enums\StaticContentTypes::EDITOR )
    <div class="form-group mb-3">
        <label for="{{Str::slug($part->name)}}">{{$part->name}}</label>
        <x-tiny-mce-editor name="value" value="{{$item->value ?? $part->value ?? null}}"/>
    </div>
    @elseif( $part->type == \App\Enums\StaticContentTypes::IMAGE )
    <div class="form-group mb-3" data-image-selector="">
        <label for="{{Str::slug($part->name)}}">{{$part->name}}</label>
        <div class="w-100">
            <input type="hidden" readonly id="image_label" class="form-control" name="value" aria-label="Image" aria-describedby="button-image" value="@isset($item){{$item->value}}@endisset"/>
            <img id="image_preview" src="{{isset($item) ? ($item->value ?? 'https://via.placeholder.com/500x180&text=select image') : $part->value ?? 'https://via.placeholder.com/500x180&text=select image'}}" alt="Image preview" class="mw-100 w-100px">
            <!-- <div class="input-group-append"> -->
            <button class="btn btn-sm btn-secondary indication button-image" data-kt-indicator="off" type="button"
                data-filemanager="" onclick="popFileManager(this)">
                <span class="indicator-label">
                    <i class="bi bi-upload"></i>
                </span>
                <span class="indicator-progress">
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
            <!-- </div> -->
        </div>
    </div>
    @elseif( $part->type == \App\Enums\StaticContentTypes::ACTION )
    <div class="form-group mb-3">
        <label for="{{Str::slug($part->name)}}">{{$part->name}} Title</label>
        <input type="text" name="title" class="form-control" value="@isset($item){{$item->value[0]}}@endisset">
    </div>
    <div class="form-group mb-3">
        <label for="{{Str::slug($part->name)}}">{{$part->name}} URL</label>
        <input type="text" name="url" class="form-control" value="@isset($item){{$item->value[1]}}@endisset">
    </div>
    @elseif( $part->type == \App\Enums\StaticContentTypes::IMAGE_CROPPER )
    <div class="form-group mb-3">
        <label for="{{Str::slug($part->name)}}">{{$part->name}} (H,W: {{isset($part) ? ($part->options->size ?? \App\Enums\ImageSize::STATIC_CONTENT_IMAGE_SIZE) : \App\Enums\ImageSize::STATIC_CONTENT_IMAGE_SIZE }} )</label>
        <x-slim-cropper :image="isset($item) ? url($item->value) : null" field="value" :size="isset($part) ? ($part->options->size ?? \App\Enums\ImageSize::STATIC_CONTENT_IMAGE_SIZE) : \App\Enums\ImageSize::STATIC_CONTENT_IMAGE_SIZE"/>
    </div>
    @endif
</div>