<div>
    <label for="tagsLabel" class="form-label">@lang("main.tags")</label>
    <div class="tom-select-custom">
        <select class="js-select form-select" autocomplete="off" id="tagsLabel" multiple name="tags[]"
            data-hs-tom-select-options='{
            "searchInDropdown": false,
            "hideSearch": false,
            "create": true
          }'>
            @foreach($tags as $tag)
            <option value="{{$tag->name}}" @if(in_array($tag->id, old('tags', $selectedTags))) selected
                @endif>{{$tag->name}}</option>
            @endforeach
        </select>
    </div>
</div>
@push('js')
<script>
    $(document).ready(function(){
        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')
    });
</script>
@endpush