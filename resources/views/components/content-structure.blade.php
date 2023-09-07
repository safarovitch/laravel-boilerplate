<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <div data-repeater="" class="inner-repeater">
        <div data-repeater-list="item_parts" id="item_parts" class="">
            @isset($item)
                @for ( $i = 0; $i < $structure->parts()->count(); $i++)
                @php $structurePart = $structure->parts->slice($i, 1)->first() ?? null @endphp
                @php $itemPart = $item->parts()->count() > $i ? ($item->parts->slice($i, 1)->first() ?? null) : null @endphp
                    <div data-repeater-item="" class="form-group d-flex flex-wrap gap-3 align-items-center mb-3">
                        <div class="col-12">
                            <input type="hidden" name="part_type_id" class="form-control" data-part-id="{{$structurePart->id}}" value="{{$structurePart->id}}">
                            <x-structure-part :part="$structurePart" :item="$itemPart" />
                        </div>
                    </div>
                @endfor
            @else
                @forelse ($structure->parts as $part)
                    <div data-repeater-item="" class="form-group d-flex flex-wrap gap-3 align-items-center mb-3">
                        <div class="col-12">
                            <input type="hidden" name="part_type_id" class="form-control" data-part-id="{{$part->id}}" value="{{$part->id}}">
                            <x-structure-part :part="$part" :item="null" />
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">
                    <p class="m-0">This structure is incomplete! Click <a href="{{route('static_content_structure.edit', $structure)}}" class="text-white text-decoration-underline">here</a> to edit this structure</p>
                    </div>
                @endforelse
            @endisset
        </div>
    </div>
</div>


{{-- <div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <div data-repeater="" class="inner-repeater">
        <div data-repeater-list="item_parts" id="item_parts" class="">
            @isset($item)
            @forelse ($item->parts as $part)
            <div data-repeater-item="" class="form-group d-flex flex-wrap gap-3 align-items-center mb-3">
                <div class="col-12">
                    <input type="hidden" name="part_type_id" class="form-control" data-part-id="{{$part->id}}" value="{{$part->id}}">
                    <x-structure-part :part="$part" :item="null" />
                </div>
            </div>
            @empty
            <x-content-structure :structure="$structure->id" />
            @endforelse
            @else
            @forelse ($structure->parts as $part)
            <div data-repeater-item="" class="form-group d-flex flex-wrap gap-3 align-items-center mb-3">
                <div class="col-12">
                    <input type="hidden" name="part_type_id" class="form-control" data-part-id="{{$part->id}}" value="{{$part->id}}">
                    <x-structure-part :part="$part" :item="null" />
                </div>
            </div>
            @empty
            <div class="alert alert-danger">
            <p class="m-0">This structure is incomplete! Click <a href="{{route('static_content_structure.edit', $structure)}}" class="text-white text-decoration-underline">here</a> to edit this structure</p>
            </div>
            @endforelse
            @endisset
        </div>
    </div>
</div> --}}