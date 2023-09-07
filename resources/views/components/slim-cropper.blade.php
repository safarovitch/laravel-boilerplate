@push('css')
<link rel="stylesheet" href="{{ asset('css/slim.css') }}">
@endpush
@php $height = explode(',',$size)[0] @endphp
@php $width = explode(',',$size)[1] @endphp
<div style="max-height: {{$height}}px;max-width:{{$width}}px;">
    <div class="slim" id="cropper-{{$field}}" data-label="{{__(Coduo\PHPHumanizer\StringHumanizer::humanize($field))}} ({{str_replace(',','x',$size)}})" data-size="{{ $size }}" data-ratio="{{ getImageRatioFromSize($size) }}" data-will-crop-initial="false"
        data-instant-edit="false" {!! $options !!} data-did-remove="imageRemoved" data-delete-id="didDeleteImage_{{Str::slug($field)}}">
        <input type="file" name="{{$field}}"/>
        @if( isset($image) )
        <img src="{{ $image }}" alt="">
        @endif
    </div>
    <input type="hidden" name="deleted_image_{{$field}}" value="0" id="didDeleteImage_{{Str::slug($field)}}"/>
</div>
@push('js')
<script src="{{ asset('js/slim.js') }}"></script>
<script>
    function imageRemoved(data, event) {
        id = $(event.element).data('delete-id');
        console.log(id)
        deleteid = '#'+id;
        $(deleteid).val(1);
    }
</script>
@endpush