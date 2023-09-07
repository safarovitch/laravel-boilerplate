<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <label for="basicFormFile" class="js-file-attach form-label" data-hs-file-attach-options='{
          "textTarget": "[for=\"customFile\"]"
         }'>File input example</label>
    <input class="form-control" type="file" id="basicFormFile">

    <ul class="list-group list-group-sm">
        @forelse ($files as $file)
        <li class="list-group-item list-group-item-light">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <i class="bi-paperclip"></i>
                </div>
                <div class="flex-grow-1 text-truncate ms-2">
                    <span class="d-block text-dark text-truncate">{{$file->name}}</span>
                    <span class="d-block small">{{$file->size}}</span>
                </div>
            </div>
        </li>
        @empty
            <p>@lang('empty.files')</p>
        @endforelse
    </ul>
</div>