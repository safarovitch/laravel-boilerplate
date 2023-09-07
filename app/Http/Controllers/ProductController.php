<?php

namespace App\Http\Controllers;

use App\Enums\ProductType;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\User;
use App\Models\Variation;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Product::query());
            $tableData->addColumn('title', function ($product) {
                $title = substr(strip_tags($product->title), 0, 50).'...';
                return '
                <a class="d-flex align-items-center" href="'.route('product.edit', $product).'">
                    <div class="flex-shrink-0">
                      <img class="avatar avatar-lg" src="'.$product->thumbnail_image.'" alt="'.$title.'">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="text-inherit mb-0">'.$title.'</h5>
                    </div>
                </a>';
            });
            $tableData->addColumn('status', function ($product) {
                return getStatusHtml($product->status);
            });
            $tableData->addColumn('actions', function ($product) {
                $r = "<div class='d-flex'>";
                // $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('product.show', $product).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm me-2" href="'.route('product.edit', $product).'"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="'.route('product.destroy', $product).'" method="POST" onSubmit="return confirm(\''.__("confirmation.product.destroy").'\')">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });
            $tableData->editColumn('price', function($product){
                $price = $product->getPrice();
                $output = "";
                if( $product->type == ProductType::SIMPLE){
                    if(is_array($price)){
                        foreach(config('app.site_currencies') as $code => $currency){
                            $output .= $currency['icon']." ".(isset($price[$code]) ? $price[$code] : '-')."<br>";
                        }
                    }else{
                        $output = $price;
                    }
                }

                if( $product->type == ProductType::VARIABLE){
                    if(isset(collect($price)['min']))
                        foreach(collect($price)['min'] as $minPriceCurrency => $minPrice){
                            if(isset(config('app.site_currencies')[$minPriceCurrency])){
                                $symbol = config('app.site_currencies')[$minPriceCurrency]['icon'];
                                $output .= sprintf("<small class='text-emerald-500'>from</small> {$symbol} %s<br>",$minPrice ?? 0);
                            }
                        }
                    else
                        foreach(config('app.site_currencies') as $code => $currency){
                            $output .= $currency['icon']." ".(isset($price[$code]) ? $price[$code] : '-')."<br>";
                        }
                }
            
                return $output;
            });
            return $tableData->rawColumns(['title','actions','price', 'status'])->make();
        }

        $dataTables = [
            ['data' => 'title', 'name' => 'title', 'title' => __("product.title")],
            ['data' => 'type', 'name' => 'body', 'title' => __("product.type")],
            // ['data' => 'sku', 'name' => 'sku', 'title' => __("product.sku")],
            // ['data' => 'qty', 'name' => 'qty', 'title' => __("product.qty")],
            ['data' => 'price', 'name' => 'price', 'title' => __("product.price")],
            ['data' => 'status', 'name' => 'status', 'title' => __("product.status")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('product.index', compact('dataTables', 'dataOrder'));
    }


    public function create()
    {
        return view('product.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'short_desc' => 'required',
            'type' => 'required',
            // 'sku' => 'required',
            // 'barcode' => 'nullable',
            // 'qty' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);


        $data = $request->all();
       
        $product = Product::create($data);

        $product->categories()->sync($request->categories);

        $product->syncTags($request->tags ?? []);

        if ($request->input('featured_image') != null) {
            // Process profile image
            $file = uploadSlimImage($request, 'featured_image');
            $product->addMedia($file['featured_image'])->preservingOriginal()->toMediaCollection('featured_image');
        }

         // generate and save product variation options
         if ($request->type == ProductType::VARIABLE) {
            $this->generateVariations($product, $request->productVariationOptions);
        }

        if( $request->ajax() ){
            return response()->json(['status' => 'success', 'message' => __('message.product.created')]);
        }

        
        return redirect()->route('product.show', $product)->with('success', __('product.created'));
    }


    // reqursive variation generator
    public function generateVariations(Product $product, $variations, $step = 0, $parent_id = null)
    {
        foreach ($variations[$step] as $optionId) {
            $productVariation = ProductVariation::create([
                'product_id' => $product->id,
                'variation_option_id' => $optionId,
                'parent_id' => NULL
            ]);

            if (count($variations) > $step + 1) $this->generateVariations($product, $variations, $step + 1, $productVariation->id);
        }
    }


    public function edit(Product $product)
    {
        return view('product.form', compact('product'));
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
        $product->syncTags($request->tags ?? []);

        if ($request->input('featured_image') != null) {
            // Process featured image
            $file = uploadSlimImage($request, 'featured_image');
            $product->clearMediaCollection('featured_image');
            $product->addMedia($file['featured_image'])->preservingOriginal()->toMediaCollection('featured_image');
        }

        if ($request->input('gallery_images') != null) {
            // Process featured image
            $product->clearMediaCollection('gallery_images');
            $files = uploadSlimImage($request, 'gallery_images');
            foreach( $files['gallery_images'] as $image){
                $product->addMedia($image)->preservingOriginal()->toMediaCollection('gallery');
            }
        }

        // if ($request->input('deleted_image_featured_image') == 1) {
        //     // delete featured image
        //     $product->clearMediaCollection('featured_image');
        // }

        if ($product->type == ProductType::VARIABLE) {
            if( isset($request->variationOptions) )
            foreach ($request->variationOptions as $variationOptionId => $variationOption) {
                $variationOption = (object) $variationOption;
                $productVariation = ProductVariation::updateOrCreate([
                    'product_id' => $product->id,
                    'id' => $variationOptionId,
                ], [
                    'product_id' => $product->id,
                    'variation_id' => $variationOption->type_id
                ]);
                $productVariation->value()->updateOrCreate([
                    'product_variation_id' => $productVariation->id,
                ], [
                    'sku' => $variationOption->variation_sku ?? $product->sku . "-" . $variationOptionId,
                    'stock' => $variationOption->variation_stock,
                    'ean' => $variationOption->variation_ean,
                    'price' => $variationOption->variation_price,
                    'discount_price' => $variationOption->variation_discount_price,
                    'width' => $variationOption->variation_width,
                    'length' => $variationOption->variation_length,
                    'height' => $variationOption->variation_height,
                    'weight' => $variationOption->variation_weight,
                ]);

                if( isset($variationOption->variation_featured_image) ){
                    $productVariation->value->clearMediaCollection('featured_image');
                    $file = json_decode($variationOption->variation_featured_image);
                    $image = $productVariation->value->addMediaFromBase64($file->output->image, ['image/jpeg','image/png', 'image/jpg'])->toMediaCollection('featured_image');
                    $image->update(['file_name' => $image->file_name.".".str_replace('image/','',$image->mime_type)]);
                    // dd($image);
                }

                // if( isset($request->deleted_image_variationOptions) ){
                //     foreach( $request->deleted_image_variationOptions as $id ){
                //         $product->variations()->find($id)->first()->value->clearMediaCollection('featured_image');
                //     }
                // }
            }
        }
        return redirect()->back()->with('success', __('product.updated'));
    }


    public function show(Product $product)
    {
        return view('product.form', compact('product'));
    }

    public function destroy(Product $product)
    {
        # code...
    }

    
    public function categories()
    {
        $parentList = Category::where('model_type', 'App\Models\Product')->get();
        $categories = Category::main()->where('model_type', 'App\Models\Product')->get();
        return view('product.category.index', compact('categories', 'parentList'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $data = array_merge(
            $request->all(),
            ['model_type' => 'App\Models\Product']
        );

        Category::create($data);

        return redirect()->back()->with('success', __('message.product.category.created'));
    }

    public function variations(Request $request)
    {
        $variations = Variation::find($request->input('variations'));
        return view('parts.product.variations', compact('variations'));
    }
    
}
