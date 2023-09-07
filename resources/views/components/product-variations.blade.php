<div>
    <div id="variations" class="px-4 py-3">

    </div>
    <div class="p-4">
        <button class="btn btn-sm btn-outline-primary" id="addVariationButton">Add variation</button>
    </div>
    @push('js')
    <script>
        $(document).ready(function(){
            $('#addVariationButton').click(function(e){
                e.preventDefault();
                e.stopPropagation();

                var variation = $('#variationTemplate').html();
                $('#variations').append(variation);
            });
        });
    </script>
    @endpush

    <template id="variationTemplate">
        <div class="row border p-2 mb-3">
            <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2 m-2">
                <label for="name">SKU</label>
                <input type="text" name="sku" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2 m-2">
                <label for="price">EAN</label>
                <input type="text" name="ean" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2 m-2">
                <label for="stock">Price</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2 m-2">
                <label for="stock">Discount Price</label>
                <input type="text" name="discount_price" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2 m-2">
                <label for="stock">Stock</label>
                <input type="text" name="stock" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2 m-2">
                <label for="stock">Width</label>
                <input type="text" name="width" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2 m-2">
                <label for="stock">Length</label>
                <input type="text" name="length" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2 m-2">
                <label for="stock">Height</label>
                <input type="text" name="height" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2 m-2">
                <label for="stock">Weight</label>
                <input type="text" name="weight" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2 m-2 d-none">
                <label for="stock">Product Variation Id</label>
                <input type="text" name="product_variation_id" class="form-control">
            </div>
        </div>
    </template>
</div>