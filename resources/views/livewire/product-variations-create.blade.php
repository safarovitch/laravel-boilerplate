<div>
    <!-- Spinner -->
    <div wire:loading.flex class="bg-light opacity-50 justify-content-center align-items-center text-center position-absolute w-100 h-100" style="top: 0; left: 0; z-index: 10;">
        <div class="spinner-border" role="status">
            <span class="sr-only">{{__("Loading")}}...</span>
        </div>
    </div>
    <!-- End Spinner -->

    <div class="card-body pt-0">
        <div class="form-group">
            @foreach( $productVariations as $key => $pVariation )
            <div class="row mb-4 border p-4">
                <div class="col-10">
                    <select class="form-select mb-2" wire:model="productVariations.{{$key}}">
                        <option value="">{{ __('Choose')}}</option>
                        @foreach( $variations as $variation )
                            <option value="{{ $variation->id }}">{{ __( $variation->name ) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-sm btn-danger" wire:click="removeProductVariation({{$key}})">{{__("Remove")}}</button>
                </div>
                <div class="col-12">
                    @if( !empty($variationOptions[$key]) )
                    <div class="card-">
                        <div class="card-body p-0 pb-2">
                            <input type="checkbox" class="btn-check" id="flexCheckDefault{{ $key }}_all" wire:click="selectAll('{{ $key }}')">
                            <label class="btn btn-sm btn-outline-secondary border text-black m-1 border-dashed border-dark" for="flexCheckDefault{{ $key }}_all"> {{ __("Select All") }}</label>
                            @foreach( $variationOptions[$key] as $option)
                                @php $option = \App\Models\VariationOption::find($option['id']) @endphp
                                <input type="checkbox" class="btn-check" id="flexCheckDefault{{ $option->id }}" value="{{ $option->id }}" wire:model="productVariationOptions.{{ $key }}.{{ $loop->index }}" name="productVariationOptions[{{ $key }}][{{ $loop->index }}]" @if( isset($productVariationOptions[$key][$loop->index]) ) checked @endif autocomplete="off">
                                <label class="btn btn-sm btn-outline-secondary border text-black m-1" for="flexCheckDefault{{ $option->id }}"> {{ __( $option->label ) }}</label>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="form-group mt-5">
            <button class="input-group-text btn btn-primary btn-sm" type="button" wire:click="addProductVariation()">{{__("Add Another Variant")}}</button>
        </div>
    </div>

</div>