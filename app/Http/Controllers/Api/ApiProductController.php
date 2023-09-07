<?php

namespace App\Http\Controllers\Api;

use App\Enums\InputType;
use App\Enums\ProductType;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductHasAttribute;
use App\Models\ProductHasBrand;
use App\Models\ProductHasClass;
use App\Models\ProductVariation;
use App\Models\ShippingClass;
use App\Models\Variation;
use App\Models\VariationOption;
use Google\Service\AndroidPublisher\Variant;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ApiProductController extends Controller
{  
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'short_desc' => 'required',
            'type' => 'required',
            'sku' => 'required',
            'barcode' => 'nullable',
            'qty' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $data = $request->all();

        $product->update($data);

        $product->categories()->sync($request->categories);
        $product->syncTags($request->tags);

        if ($request->input('featured_image') != null) {
            // Process featured image
            $product->clearMediaCollection('featured_image');
            $product->addMediaFromUrl($request->input('featured_image'))->preservingOriginal()->toMediaCollection('featured_image');
        }

        return response()->json();
    }

    public function storeAll(Request $request)
    {
        foreach ($request->all() as $product) {
            $request = new Request($product);
            $this->store($request);
        }
    }


    public function store(Request $request)
    {

        $rules = [
            'title' => 'required',
            'desc' => 'required',
            'short_desc' => 'required',
            'type' => 'required',
            'sku' => 'required',
            'barcode' => 'nullable',
            'ean' => 'nullable',
            'price' => 'nullable',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = $request->all();

        $product = Product::firstOrCreate(['id'=>$data['id']], $data);

        $product->save();

        // $product->categories()->sync($request->categories);
        // $product->syncCategories($request->categories);
        foreach ($request->categories as $category) {
            $category = Category::firstOrCreate(
                ['title->'.app()->getLocale() => $category, 'model_type' => 'App\Models\Product'],
                ['title' => $category, 'model_type' => 'App\Models\Product']
            );
            $product->categories()->attach($category);
        }
        $product->syncTags($request->tags ?? []);

        if ($request->input('featured_image') != null && filter_var($request->input('featured_image'), FILTER_VALIDATE_URL)) {
            // Process featured image
            // $file = uploadSlimImage($request, 'featured_image');
            $product->clearMediaCollection('featured_image');
            $image = $product->addMediaFromUrl($request->featured_image)->preservingOriginal()->toMediaCollection('featured_image');
            // $image->update(['file_name' => $image->file_name.".".str_replace('image/','',$image->mime_type)]);
        }

        if ($request->input('gallery_images') != null) {
            // Process featured image
            // $files = uploadSlimImage($request, 'gallery_images');
            $product->clearMediaCollection('gallery_images');
            foreach( $request->gallery_images as $image){
                if(filter_var( $image, FILTER_VALIDATE_URL)){
                    $image = $product->addMediaFromUrl($image)->preservingOriginal()->toMediaCollection('gallery');
                    // $image->update(['file_name' => $image->file_name.".".str_replace('image/','',$image->mime_type)]);
                }
            }
        }

        if( $request->has('brand') && $request->brand != null && $request->brand != '' ){
            $brand = Brand::firstOrCreate(
                ['name' => $request->brand]
            );
            ProductHasBrand::firstOrCreate(['product_id' => $product->id, 'brand_id' => $brand->id]);
        }

        if( $request->has('shipping_class') && $request->shipping_class != null && $request->shipping_class != '' ){
            $class = ShippingClass::firstOrCreate(
                ['title->'.app()->getLocale() => $request->shipping_class],
                ['title' => $request->shipping_class]
            );
            ProductHasClass::firstOrCreate(['product_id' => $product->id, 'class_id' => $class->id]);
        }


        if( $request->has('attributes') && $request->input('attributes') != null && $request->input('attributes') != '' ){
            foreach( $request->input('attributes')[0] as $attribute => $option ){
                $attr = Attribute::firstOrCreate(
                    ['name->'.app()->getLocale() => $attribute],
                    ['name' => $attribute, 'type' => InputType::TEXT]
                );
                $attrOption = AttributeOption::firstOrCreate(
                    ['value->'.app()->getLocale() => $option],
                    ['value' => $option, 'attribute_id' => $attr->id]
                );
                ProductHasAttribute::firstOrCreate(['product_id' => $product->id, 'attribute_option_id' => $attrOption->id]);
            }
        }

        if ($product->type == ProductType::VARIABLE) {
            if( isset($request->variations) && $request->variations != null && $request->variations != "null")
            foreach ($request->variations as $variationOptionArr) {
                $variationOptionArr = (object) $variationOptionArr;
                // dd($variationOption->type_name);
                // since the data is being pushed from api, we need to make sure variation is saved properly
                
                // V2
                
                $variationCount = count($variationOptionArr->options);
                $currentVariation = 1;
                $previousVariation = null;
                foreach( $variationOptionArr->options as $variationName => $optionName ){
                    $variation = Variation::firstOrCreate(
                        ['name->'.app()->getLocale() => $variationName, 'type' => InputType::SELECT],
                        ['name' => $variationName, 'type' => InputType::SELECT]
                    );
                    $variationOption = VariationOption::firstOrCreate(
                        ['variation_id' => $variation->id, 'label->'.app()->getLocale() => $optionName, 'value->'.app()->getLocale() => $optionName],
                        ['label' => $optionName, 'value' => $optionName]
                    );

                    $productVariation = ProductVariation::firstOrCreate([
                        'product_id' => $product->id,
                        'variation_option_id' => $variationOption->id
                    ]);

                    if( $currentVariation <= $variationCount && $previousVariation != null){
                        $productVariation->parent_id = $previousVariation->id;
                        $productVariation->save();
                    }
                    if( $currentVariation == $variationCount ){
                        $productVariation->value()->updateOrCreate([
                            'product_variation_id' => $productVariation->id,
                        ], [
                            'sku' => $variationOptionArr->sku ?? $product->sku . "-" . $variationOption->id,
                            'stock' => $variationOptionArr->stock ?? 0,
                            'ean' => $variationOptionArr->ean ?? null,
                            'price' => $variationOptionArr->price,
                            'discount_price' => $variationOptionArr->discount_price ?? null,
                            'width' => $variationOptionArr->width ?? null,
                            'length' => $variationOptionArr->length ?? null,
                            'height' => $variationOptionArr->height ?? null,
                            'weight' => $variationOptionArr->weight ?? null,
                        ]);

                        if( isset($variationOptionArr->featured_image) ){
                            if (filter_var($variationOptionArr->featured_image, FILTER_VALIDATE_URL)) { 
                                $productVariation->value->clearMediaCollection('featured_image');
                                $file = $variationOptionArr->featured_image;
                                // $productVariation->value->addMediaFromBase64($file->output->image, ['image/jpeg','image/png', 'image/jpg'])->toMediaCollection('featured_image');
                                $productVariation->value->addMediaFromUrl($file)->preservingOriginal()->toMediaCollection('featured_image');
                            }
                        }
                    }

                    $previousVariation = $productVariation;
                    $currentVariation++;
                }

                // END: V2


                // $variation = Variation::firstOrCreate(['name->'.app()->getLocale() => $variationOptionArr->type_name, 'type' => InputType::TEXT]);

                // $variationOption = VariationOption::firstOrCreate(
                //     ['variation_id' => $variation->id, 'label->'.app()->getLocale() => $variationOptionArr->name, 'value->'.app()->getLocale() => $variationOptionArr->name],
                //     ['label' => $variationOptionArr->name, 'value' => $variationOptionArr->name]
                // );

                // $productVariation = ProductVariation::create([
                //     'product_id' => $product->id,
                //     'variation_option_id' => $variationOption->id
                // ]);


                // $productVariation->value()->updateOrCreate([
                //     'product_variation_id' => $productVariation->id,
                // ], [
                //     'sku' => $variationOptionArr->sku ?? $product->sku . "-" . $variationOption->id,
                //     'stock' => $variationOptionArr->stock ?? 0,
                //     'ean' => $variationOptionArr->ean ?? null,
                //     'price' => $variationOptionArr->price,
                //     'discount_price' => $variationOptionArr->discount_price ?? null,
                //     'width' => $variationOptionArr->width ?? null,
                //     'length' => $variationOptionArr->length ?? null,
                //     'height' => $variationOptionArr->height ?? null,
                //     'weight' => $variationOptionArr->weight ?? null,
                // ]);

                // if( isset($variationOptionArr->featured_image) ){
                //     $productVariation->value->clearMediaCollection('featured_image');
                //     $file = $variationOptionArr->featured_image;
                //     // $productVariation->value->addMediaFromBase64($file->output->image, ['image/jpeg','image/png', 'image/jpg'])->toMediaCollection('featured_image');
                //     $productVariation->value->addMediaFromUrl($file)->preservingOriginal()->toMediaCollection('featured_image');
                // }
            }
        }

        $product->save();

        return response()->json(['result' => 'Product created with id:'.$product->id],200);
    }


    public function storeAllTest(Request $request)
    {
        Log::info($request->id);
        return response()->json($request->all(),200);
    }
}