@foreach( $productVariationOptions as $key => $pVariation )
@if( $pVariation->options()->count() )
@include('parts.product-variation-option-fragment', ['productVariationOptions' => $pVariation->options])
@else
<div class="accordion accordion-icon-toggle border mt-3 mb-3 p-2 bg-white" id="variationAccordion-{{$pVariation->id}}">
    <div class="">
        <!--begin::Header-->
        <div class="accordion-header py-2 d-flex collapsed cursor-pointer" data-bs-toggle="collapse"
            data-bs-target="#variationAccordion-{{$pVariation->id}}-item">
            <span class="accordion-icon">
                <i class="fa fa-chevron-right"></i>
            </span>
            <h4 class="fs-6 fw-bold mb-0 ms-4 w-100">
                <label class="badge bg-warning me-1 text-dark float-left" data-bs-toggle="tooltip"
                    data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="{{ __('Stock') }}">{{
                    optional($pVariation->value)->stock }}</label>
                {!! $pVariation->ancestorName !!}
                <label class="badge bg-dark text-white float-end" data-bs-toggle="tooltip"
                    data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="{{ __('EAN') }}">#{{
                    optional($pVariation->value)->ean }}</label>
                <label class="badge bg-success text-white me-1 float-end" data-bs-toggle="tooltip"
                    data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="{{ __('SKU') }}">#{{
                    optional($pVariation->value)->sku }}</label>
            </h4>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div id="variationAccordion-{{$pVariation->id}}-item" class="fs-6 collapse"
            data-bs-parent="#variationAccordion-{{$pVariation->id}}">
            <div class="row p-4">
                <div class="col-12 col-lg-3">
                    <div class="form-group">

                        <x-slim-cropper :image="$pVariation->image" field="variationOptions[{{$pVariation->id}}][variation_featured_image]"/>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <input type="hidden" name="variationOptions[{{$pVariation->id}}][type_id]"
                            value="{{ old('variationOptions.'.$pVariation->id.'.type_id', optional($pVariation)->variation_id ?? '') }}"
                            class="form-control" id="product-variation-option-sku-{{ $pVariation->id }}">
                        <input type="hidden" name="variationOptions[{{$pVariation->id}}][product_id]"
                            value="{{ old('variationOptions.'.$pVariation->id.'.product_id', optional($pVariation)->product_id ?? '') }}"
                            class="form-control" id="product-variation-option-sku-{{ $pVariation->id }}">

                        <div class="form-group mb-3 col-12 col-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="product-variation-option-sku-{{ $pVariation->id }}">{{ __("SKU") }}</label>
                            <input type="text" name="variationOptions[{{$pVariation->id}}][variation_sku]"
                                value="{{ old('variationOptions.'.$pVariation->id.'.variation_sku', optional($pVariation->value)->sku ?? '') }}"
                                class="form-control" id="product-variation-option-sku-{{ $pVariation->id }}">
                        </div>

                        <div class="form-group mb-3 col-12 col-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="product-variation-option-stock-{{ $pVariation->id }}">{{ __("Stock") }}</label>
                            <input type="text" name="variationOptions[{{$pVariation->id}}][variation_stock]"
                                value="{{ old('variationOptions.'.$pVariation->id.'.variation_stock', optional($pVariation->value)->stock) }}"
                                class="form-control" id="product-variation-option-stock-{{ $pVariation->id }}">
                        </div>

                        <div class="form-group mb-3 col-12 col-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="product-variation-option-barcode-{{ $pVariation->id }}">{{ __("EAN")}}</label>
                            <input type="text" name="variationOptions[{{$pVariation->id}}][variation_ean]"
                                value="{{ old('variationOptions.'.$pVariation->id.'.variation_EAN', optional($pVariation->value)->ean ?? '') }}"
                                class="form-control" id="product-variation-option-EAN-{{ $pVariation->id }}">
                        </div>

                    </div>
                    <div class="row">
                        @foreach (config('app.site_currencies') as $code => $currency)

                        <div class="form-group mb-3 col-12 col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
								<label>@lang('product.price')</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"
											id="inputGroup-price">{{$currency['icon']}}</span>
									</div>
                                    <input type="number" name="variationOptions[{{$pVariation->id}}][variation_price][{{$code}}]"
                                        value="{{ old('variationOptions.'.$pVariation->id.'.variation_price.'.$code, optional($pVariation->value)->getPrice($code) ?? null ) }}"
                                        class="form-control" id="product-variation-option-price-{{ $pVariation->id }}-{{$code}}">
								</div>
							</div>
                        </div>
                        <div class="form-group mb-3 col-12 col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
								<label>@lang('product.discount_price')</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"
											id="inputGroup-price">{{$currency['icon']}}</span>
									</div>
                                    <input type="number" name="variationOptions[{{$pVariation->id}}][variation_discount_price][{{$code}}]"
                                        value="{{ old('variationOptions.'.$pVariation->id.'.variation_discount_price.'.$code, optional($pVariation->value)->discount_price[$code] ?? null ) }}"
                                        class="form-control" id="product-variation-option-discount-price-{{ $pVariation->id }}-{{$code}}">
								</div>
							</div>
                        </div>

                        @endforeach
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-12 col-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="product-variation-option-length-{{ $pVariation->id }}">{{ __("Length") }}</label>
                            <input type="number" name="variationOptions[{{$pVariation->id}}][variation_length]"
                                value="{{ old('variationOptions.'.$pVariation->id.'.variation_length', optional($pVariation->value)->length ) }}"
                                class="form-control" id="product-variation-option-length-{{ $pVariation->id }}">
                        </div>

                        <div class="form-group mb-3 col-12 col-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="product-variation-option-height-{{ $pVariation->id }}">{{ __("Height") }}</label>
                            <input type="number" name="variationOptions[{{$pVariation->id}}][variation_height]"
                                value="{{ old('variationOptions.'.$pVariation->id.'.variation_height', optional($pVariation->value)->height ) }}"
                                class="form-control" id="product-variation-option-height-{{ $pVariation->id }}">
                        </div>

                        <div class="form-group mb-3 col-12 col-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="product-variation-option-width-{{ $pVariation->id }}">{{ __("Width") }}</label>
                            <input type="number" name="variationOptions[{{$pVariation->id}}][variation_width]"
                                value="{{ old('variationOptions.'.$pVariation->id.'.variation_width', optional($pVariation->value)->width ) }}"
                                class="form-control" id="product-variation-option-width-{{ $pVariation->id }}">
                        </div>

                        <div class="form-group mb-3 col-12 col-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="product-variation-option-weight-{{ $pVariation->id }}">{{ __("Weight") }}</label>
                            <input type="number" name="variationOptions[{{$pVariation->id}}][variation_weight]"
                                value="{{ old('variationOptions.'.$pVariation->id.'.variation_weight', optional($pVariation->value)->weight ) }}"
                                class="form-control" id="product-variation-option-weight-{{ $pVariation->id }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--end::Body-->
    </div>
</div>
@endif
@endforeach