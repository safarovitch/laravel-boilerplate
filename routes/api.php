<?php

use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\FrontEndController;
use App\Http\Controllers\Api\ApiBlogPostController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\ApiRouteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['locale'])->group(function () {

    Route::get('translations', [FrontEndController::class, 'translations']);
    Route::get('translations/{locale}', [FrontEndController::class, 'translation']);
    Route::get('translations/{locale}/common.json', [FrontEndController::class, 'translationJson']);

    // Auth Routes
    Route::post('login', [FrontEndController::class, 'login']);
    Route::post('register', [FrontEndController::class, 'register']);

    // Auth protected Routes
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('logout', [FrontEndController::class, 'logout']);
        Route::get('/profile', [FrontEndController::class, 'profile']);
        Route::post('/update-profile', [FrontEndController::class, 'updateProfile']);
        Route::put('add_address', [FrontEndController::class, 'addAddress']);
        Route::put('update_address/{address}', [FrontEndController::class, 'updateAddress']);
    });

    Route::get('/posts', [FrontEndController::class, 'posts']);
    Route::get('/post/{post}', [FrontEndController::class, 'post']);

    Route::get('/products', [FrontEndController::class, 'products']);
    Route::get('/product/{product}', [FrontEndController::class, 'product']);
    Route::get('product/{product}/{variation}', [FrontEndController::class, 'showVariation']);
    Route::get('product/{product}/{variation_id}/{option_id}', [FrontEndController::class, 'productVariationOption']);

    Route::get('/categories', [FrontEndController::class, 'categories']);
    Route::get('/category/{category}', [FrontEndController::class, 'category']);


    Route::get('cart', [FrontEndController::class, 'cart']);
    Route::get('cart-items', [FrontEndController::class, 'cartItems']);
    Route::get('cart-conditions', [FrontEndController::class, 'cartConditions']);
    Route::get('add-to-cart', [FrontEndController::class, 'addToCart']);
    Route::get('update-cart-product', [FrontEndController::class, 'updateCartProduct']);
    Route::get('remove-cart-product', [FrontEndController::class, 'removeCartProduct']);
    Route::get('clear-cart', [FrontEndController::class, 'clearCart']);
    Route::get('clear-cart-conditions', [FrontEndController::class, 'clearCartConditions']);

    Route::get('country_list', [FrontEndController::class, 'countryList']);

    Route::get('payment_methods', [FrontEndController::class, 'paymentMethods']);
    Route::get('shipping_methods', [FrontEndController::class, 'shippingMethods']);
    Route::get('checkout', [FrontEndController::class, 'checkout']);

    Route::get('apply_coupon/{code}', [FrontEndController::class, 'applyCoupon']);


    Route::get('static_content/{static_content_slug}', [FrontEndController::class, 'getStaticContent']);

    /**
     * Search
     */
    Route::any('search', [FrontEndController::class, 'search']);


    /**
     * Administrative API Endpoints
     */
    Route::middleware([])->prefix('admin')->group(function(){
        Route::get('product/{product}', [ApiProductController::class, 'show']);
        Route::put('product/{product}', [ApiProductController::class, 'update']);
        Route::post('product/store', [ApiProductController::class, 'store']);
        Route::post('product/store_all', [ApiProductController::class, 'storeAll']);
        Route::post('product/store_all_test', [ApiProductController::class, 'storeAllTest']);

        Route::post('category/store_all', [ApiCategoryController::class, 'storeAll']);

        Route::get('post/{post}', [ApiBlogPostController::class, 'show']);
        Route::post('post/store_all', [ApiBlogPostController::class, 'storeAll']);
        Route::post('post/store', [ApiBlogPostController::class, 'store']);
        Route::put('post/{post}', [ApiBlogPostController::class, 'update']);
    });



    /**
     * API Route Endpoints for next.js
     */
    // Route::any('route', [ApiRouteController::class, 'route']);
    Route::prefix('route')->group(function(){
        Route::get('product_variation/{product_variation:id}', [ApiRouteController::class, 'routeVariation']);
        Route::get('{type}/{slug}', [ApiRouteController::class, 'routeByType']);
        Route::get('{slug}', [ApiRouteController::class, 'routeBySlug']);
    });

});
