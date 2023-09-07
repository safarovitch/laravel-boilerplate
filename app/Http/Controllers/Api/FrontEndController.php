<?php

namespace App\Http\Controllers\Api;

use App\Enums\ProductType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\CategoryProductResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\StaticContentResource;
use App\Http\Resources\TranslationJsonResource;
use App\Http\Resources\TranslationResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\VariableProductResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationOptionValue;
use App\Models\StaticContent;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Google\Service\ShoppingContent\ProductTax;
use Hamcrest\Type\IsNumeric;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Spatie\TranslationLoader\LanguageLine;

class FrontEndController extends Controller
{
    /**
     * Auth Routes
     */
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return response()->json(['message' => __("message.login.success"), 'redirect' => $this->intended()], 200);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => __("message.logout.success"), 'redirect' => $this->intended()], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(60),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->json(['message' => __("message.register.success"), 'redirect' => $this->intended()], 200);
    }


    /**
     * Profile Methods
     */

    public function profile()
    {
        return new UserResource(Auth::user());
    }

    public function updateProfile(Request $request)
    {
        // TODO: update user profile
        $request->validate();
        $user = auth()->user();
        $user->update[$request->all()];
        return response()->json(['message' => __("message.profile.update.success"), 'content' => $this->intended()], 200);
    }


    /**
     * Blog Methods
     */
    public function posts(Request $request)
    {
        $pagination = $request->input('per_page', 10);
        return PostResource::collection(Post::published()->paginate($pagination));
    }

    public function post(Post $post)
    {
        return new PostResource($post);
    }


    /**
     * Product Methods
     */
    public function products(Request $request)
    {
        $pagination = $request->input('per_page', 30);

        // filters may contain category, brand, price, and also any of product attributes.
        $filters = $request->query();

        $products = Product::query();

        // filtering by category
        if (isset($filters['category'])) {
            $products = $products->whereHas('categories', function ($query) use ($filters) {
                $query->where('categories.id', $filters['category'])->orWhere('categories.title->'.app()->getLocale(), $filters['category']);
            });
        }

        // filtering by brand
        if (isset($filters['brand'])){
            $products = $products->whereHas('brand', function ($query) use ($filters) {
                $query->where('brands.id', $filters['brand'])->orWhere('brands.name', $filters['brand']);
            });
        }

        // filtering by attribute
        if (isset($filters['attribute'])) {
            foreach($filters['attribute'] as $attributeValue) {
                $products = $products->whereHas('attributes', function($query) use ($attributeValue){
                    return $query->where('value->'.app()->getLocale(), $attributeValue);
                });
            }
        }

        // filtering by price
        if (isset($filters['price_min']) && isset($filters['price_max'])) {
            $products = $products->whereBetween('price', [$filters['price_min'],$filters['price_max']]);
        }elseif(isset($filters['price'])){
            $products = $products->where('price', '>=', $filters['price']);
        }elseif(isset($filters['price_max'])){
            $products = $products->where('price', '<=', $filters['price_max']);
        }elseif(isset($filters['price_min'])){
            $products = $products->where('price', '>=', $filters['price_min']);
        }

        return ProductResource::collection($products->paginate($pagination));
    }

    public function product(Product $product)
    {
        if( $product->type == ProductType::VARIABLE)
            return new VariableProductResource($product);
        if( $product->type == ProductType::SIMPLE )
            return new ProductResource($product);
    }

    public function showVariation(Request $request, Product $product, $variation)
    {
        $variation = ProductVariation::where('product_id', $product->id)->where('id', $variation)->first();
        if ($variation) {
            return response()->json(array_merge($product->toArray(), [
                'variation' => array_merge($variation->toArray(),[
                    'option' => $variation->value,
                    'image' => $variation->image
                ]),
            ]), 200);
        }
        return response()->json(['message' => 'Variation not found'], 404);
    }

    public function productVariationOption(Request $request,Product $product, $variation_id, $option_id)
    {
        $variation = ProductVariation::findOrFail($variation_id);
        $option = ProductVariationOptionValue::where(['product_variation_id' => $variation_id, 'id' => $option_id])->firstOrFail();
        if ($variation && $option) {
            return response()->json(array_merge($product->toArray(), [
                'variation' => array_merge($variation->toArray(),[
                    'option' => $variation->value,
                    'image' => $variation->image
                ]),
            ]), 200);
        }
        return response()->json(['message' => 'Variation not found'], 404);
    }

    /**
     * Category Routes
     */
    public function categories()
    {
        return CategoryResource::collection(Category::paginate(20));
    }
    
    public function category(Category $category)
    {
        return new CategoryResource($category);
    }
    
    /**
     * Cart methods
     */
    public function cart(Request $request)
    {
        return cart()->getContent();
    }

    public function cartItems(Request $request)
    {
        return cart()->getContent();
    }

    public function cartConditions(Request $request)
    {
        return cart()->getConditions();
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'currency_code' => 'required',
            'variant_id' => 'nullable|integer',
            'attributes' => 'nullable|array',
        ]);

        $productCartId = $request->product_id;
        $currency_code = $request->currency_code;
        $product = Product::find($request->product_id);
        $price = $product->price;

        $currency_code = isset($price[$currency_code]) ? $currency_code : array_keys($price)[0];

        // if(isset($request->variations)){
        //     $variations = $request->variations;
        //     foreach ($variations as $variation_id){
        //         $variation = ProductVariation::findOrFail($variation_id);
        //         $productCartId .= $variation->id;
        //     }
        // }

        $variation = null;
        if(isset($request->variation_id)){
            $variation = ProductVariation::findOrFail($request->variation_id);
            $productCartId .= $variation->id;
        }

        $price = $product->price[$currency_code];

        $data = array(
            'id' => $productCartId,
            'name' => $product->title,
            'price' => $price,
            'quantity' => $request->quantity,
            'attributes' => [
                'product_id' => $product->id,
                'image' => $variation ? ($variation->image ?? $variation->image ) : $product->featured_image,
                'currency' => $currency_code,
                'variant' => $variation != null ? [
                    'variant_id' => $variation->id,
                    'variant' => $variation->name,
                    'image' => $variation->image,
                    'sku' => $variation->value->sku,
                    'stock' => $variation->value->stock,
                    'ean' => $variation->value->ean,
                    'price' => $variation->value->price,
                    'discount_price' => $variation->value->discount_price,
                    'width' => $variation->value->width,
                    'length' => $variation->value->length,
                    'height' => $variation->value->height,
                    'weight' => $variation->value->weight
                ] : []
            ],
            'associatedModel' => $product
        );

        cart()->add($data);

        return response()->json(['message', __('cart.product.added'), 200]);
    }

    public function updateCartProduct(Request $request, Product $product)
    {
        $productCartId = $product->id;

        $data = array(
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => array(),
        );

        cart()->update($productCartId,$data);

        return response()->json(['message', __('car.product.updated'), 200]);
    }

    public function removeCartProduct(Request $request)
    {
        $productCartId = $request->product_id;

        if(!cart()->get($productCartId)){
            return response()->json(['message', __('car.product.not_found'), 404]);
        }
        // delete an item on cart
        cart()->remove($productCartId);

        return response()->json(['message', __('car.product.removed'), 200]);
    }

    public function clearCart(Request $request)
    {
        cart()->clear();
        return cart()->getContent();
    }

    public function clearCartConditions(Request $request)
    {
        cart()->clearCartConditions();
        return cart();
    }

    /**
     * Return the intended url from the session.
     *
     * @return string
     */
    public function intended()
    {
        return session()->get('from') ?? RouteServiceProvider::HOME; //$this->intended(RouteServiceProvider::HOME);
    }


    /**
     * Get translations for desired language for frontend
     */
    public function translations()
    {
        $translations = LanguageLine::where('group', 'frontend')->get();
        return response()->json($translations);
    }

    /**
     * Get translations for desired language for frontend
     */
    public function translation($locale)
    {
        $lang = array_key_exists($locale, config('app.site_locales')) ? $locale : app()->getLocale();
        app()->setLocale($lang);
        $translations = LanguageLine::where('group', 'frontend')->get();
        return TranslationResource::collection($translations);
    }

    public function translationJson($locale)
    {
        $lang = array_key_exists($locale, config('app.site_locales')) ? $locale : app()->getLocale();
        app()->setLocale($lang);
        $translations = LanguageLine::where('group', 'frontend')->get();
        $result = [];
        foreach($translations as $tra){
            if(isset($tra->text[$locale]))
                $result[$tra->key] = $tra->text[$locale];
        }
        return $result;
    }


    /** 
     * Static content renderer
    */
    public function getStaticContent($static_content_slug)
    {
        $locale = app()->getLocale();

        $static_content = is_numeric($static_content_slug) 
                            ? StaticContent::find($static_content_slug) 
                            : (
                                StaticContent::where('slug', $static_content_slug)->where('locale', $locale)->first() 
                                ?? abort(404, 'Requested content was not found!')
                            );

        return new StaticContentResource($static_content);
    }






    /**
     * Search functions
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $pagination = $request->paginate ?? 15;
        $result = Product::search($search)->paginate($pagination);
        return response()->json($result);
    }




    /**
     * Checkout operations
     */

    public function applyCoupon($code)
    {
        return response()->json(['message' => applyCoupon($code)]);
    }


    public function countryList()
    {
        return getContent(
            contentSlug: 'country_list', 
            contentLocale: null, 
            json: true
        );
    }
    
}
