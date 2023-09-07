<div>
    <!-- Spinner -->
    <div wire:loading.flex class="bg-light opacity-50 justify-content-center align-items-center text-center position-absolute w-100 h-100" style="top: 0; left: 0; z-index: 10;">
        <div class="spinner-border" role="status">
            <span class="sr-only">{{__("Loading")}}...</span>
        </div>
    </div>
    <!-- End Spinner -->

    <div class="pt-0">
        <div class="form-group">
            @include('parts.product-variation-option-fragment', ['$productVariationOptions' => $productVariationOptions])
        </div>
        <div class="form-group mt-5">
            <!-- <button class="input-group-text btn btn-primary btn-sm" type="button" wire:click="addProductVariation()">{{__("Add Another Variant")}}</button> -->
        </div>
    </div>

</div>