<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <div>
        <label for="tags-{{$field}}-Label" class="form-label mb-0">@lang("main.".$field.".label")</label>
        <div class="tom-select-custom">
            <select class="js-select form-select" autocomplete="off" id="tags-{{$field}}-Label" name="{{$field}}"
                data-hs-tom-select-options='{
                    "searchInDropdown": true,
                    "hideSearch": false,
                    "create": false
                }'>
                @isset($empty)
                <option value=""></option>
                @endisset
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" @if(in_array($tag->id, old('tags', $selectedTags))) selected @endif>{{$tag->name ?? $tag->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @push('js')
    <script>
        $(document).ready(function(){
            // INITIALIZATION OF SELECT
            // =======================================================
            HSCore.components.HSTomSelect.init('#tags-{{$field}}-Label')
        });
    </script>
    @endpush
</div>