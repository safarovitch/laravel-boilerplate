<?php

// use Illuminate\Support\Facades\Auth;

use App\Enums\ProductType;
use App\Enums\UserRole;
use App\Events\MessageNotification;
use App\Http\Controllers\_front\StoreController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\VariationsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\ShippingZoneController;
use App\Http\Controllers\StaticContentController;
use App\Http\Controllers\StaticContentStructureController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Glhd\Gretel\Routing\ResourceBreadcrumbs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('set-locale/{locale}', [SystemController::class, 'setLocale'])->name('system.set.locale');

// Route::get('/event', function(){

//     return event(new MessageNotification("This is a broadcast test."));
    
//     event(new MessageNotification("This is a broadcast test2."));
//     event(new MessageNotification("This is a broadcast test3."));
//     event(new MessageNotification("This is a broadcast test4."));
// });

// Route::get('/fix', function(){
//     $products = Product::all();
//     foreach($products as $product){
//         if(isset($product->price[0]) and is_array($product->price[0])){
//             $product->price = $product->price[0];
//             $product->save();
//         }

//         foreach(ProductVariationOptionValue::where('price', '!=', '')->get() as $variationOption){
//             if(isset($variationOption->price[0]) and is_array($variationOption->price[0])){
//                 $variationOption->price = $variationOption->price[0];
//                 $variationOption->save();
//             }
//             if(isset($variationOption->discount_price[0]) and is_array($variationOption->discount_price[0])){
//                 $variationOption->discount_price = $variationOption->discount_price[0];
//                 $variationOption->save();
//             }
//         }
//     }
// });


// Client Routes
Route::middleware([])->group(function(){
    Route::get('/', [StoreController::class, 'index'])->name('home');
    Route::get('/store', [StoreController::class, 'shop'])->name('shop');
    Route::get('/product/{product}', [StoreController::class, 'product'])->name('product');
    Route::get('/category/{category}', [StoreController::class, 'category'])->name('category');
    Route::get('/checkout', [StoreController::class, 'checkout'])->name('checkout');
    Route::get('/cart', [StoreController::class, 'cart'])->name('cart');
    Route::get('/contact', [StoreController::class, 'contact'])->name('contact');
    Route::get('/search', [StoreController::class, 'search'])->name('search');
});


// Admin Routes
Route::middleware(['auth', 'locale', 'role:' . implode(',', [UserRole::SU, UserRole::ADMIN, UserRole::MANAGER, UserRole::EDITOR])])->prefix('admin')->group(function () {

    Route::get('/', [SystemController::class, 'dashboard'])->name('dashboard');

    Route::resource('user', UserController::class)
    ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
        $breadcrumbs
            ->index(__("breadcrumbs.user.index"))
            ->create(__("breadcrumbs.user.create"))
            ->show(__("breadcrumbs.user.show"))
            ->edit(__("breadcrumbs.user.edit"));
    });
    Route::post('generate-api-token/{user}', [UserController::class, 'generateApiToken'])->name('user.generate-token');

    Route::resource('role', RoleController::class)
    ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
        $breadcrumbs
            ->index(__("breadcrumbs.role.index"))
            ->create(__("breadcrumbs.role.create"))
            ->show(__("breadcrumbs.role.show"))
            ->edit(__("breadcrumbs.role.edit"));
    });

    Route::resource('post', BlogController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.blog.index"))
                ->create(__("breadcrumbs.blog.create"))
                ->show(__("breadcrumbs.blog.show"))
                ->edit(__("breadcrumbs.blog.edit"));
        });

    Route::get('blog-categories', [BlogController::class, 'categories'])->name('blog.categories')->breadcrumb(__('breadcrumbs.blog.categories'));
    Route::post('blog-categories/store', [BlogController::class, 'storeCategory'])->name('blog.categories.store');

    Route::resource('product', ProductController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.product.index"))
                ->create(__("breadcrumbs.product.create"))
                ->show(__("breadcrumbs.product.show"))
                ->edit(__("breadcrumbs.product.edit"));
        });

    Route::get('product-categories', [ProductController::class, 'categories'])->name('product.categories')->breadcrumb(__('breadcrumbs.product.categories'));
    Route::post('product-categories/store', [ProductController::class, 'storeCategory'])->name('product.categories.store');
    Route::post('product/variations', [ProductController::class, 'variations'])->name('product.variations');

    Route::resource('variation', VariationsController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.variations.index"))
                ->create(__("breadcrumbs.variations.create"))
                ->show(__("breadcrumbs.variations.show"))
                ->edit(__("breadcrumbs.variations.edit"));
        });
    Route::any('variation/option/template/load', [VariationsController::class, 'loadVariationOptionTemplate'])->name('variation.option.template.load');
    Route::any('variation/{variation_id}/variation/{variation_option_id}/delete', [VariationsController::class, 'deleteVariation'])->name('variation.option.delete');

    Route::resource('attribute', AttributeController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.attribute.index"))
                ->create(__("breadcrumbs.attribute.create"))
                ->show(__("breadcrumbs.attribute.show"))
                ->edit(__("breadcrumbs.attribute.edit"));
        });

    Route::any('attribute/option/template/load', [AttributeController::class, 'loadOptionTemplate'])->name('attribute.option.template.load');
    Route::any('attribute/{attribute_id}/attribute/{attribute_option_id}/delete', [AttributeController::class, 'deleteAttribute'])->name('attribute.option.delete');

    // Route::resource('tag', TagController::class)
    //     ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
    //         $breadcrumbs
    //             ->index(__("breadcrumbs.tag.index"))
    //             ->create(__("breadcrumbs.tag.create"))
    //             ->show(__("breadcrumbs.tag.show"))
    //             ->edit(__("breadcrumbs.tag.edit"));
    //     });

    Route::resource('service', ServiceController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.service.index"))
                ->create(__("breadcrumbs.service.create"))
                ->show(__("breadcrumbs.service.show"))
                ->edit(__("breadcrumbs.service.edit"));
        });

    Route::resource('order', OrderController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.order.index"))
                ->create(__("breadcrumbs.order.create"))
                ->show(__("breadcrumbs.order.show"))
                ->edit(__("breadcrumbs.order.edit"));
        });
    Route::put('order/{order}/updatestatus', [OrderController::class, 'updateStatus'])->name('order.updateStatus');

    Route::resource('customer', CustomerController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.customer.index"))
                ->create(__("breadcrumbs.customer.create"))
                ->show(__("breadcrumbs.customer.show"))
                ->edit(__("breadcrumbs.customer.edit"));
        });

    Route::resource('shipping_method', ShippingMethodController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.shipping_methods.index"))
                ->create(__("breadcrumbs.shipping_methods.create"))
                ->show(__("breadcrumbs.shipping_methods.show"))
                ->edit(__("breadcrumbs.shipping_methods.edit"));
        });

    // Route::resource('shipping_method', ShippingMethodController::class)
    //     ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
    //         $breadcrumbs
    //             ->index(__("breadcrumbs.method.index"))
    //             ->create(__("breadcrumbs.method.create"))
    //             ->show(__("breadcrumbs.method.show"))
    //             ->edit(__("breadcrumbs.method.edit"));
    //     });

    Route::resource('shipping_zone', ShippingZoneController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.shipping_zone.index"))
                ->create(__("breadcrumbs.shipping_zone.create"))
                ->show(__("breadcrumbs.shipping_zone.show"))
                ->edit(__("breadcrumbs.shipping_zone.edit"));
        });

    Route::resource('brand', BrandController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.brand.index"))
                ->create(__("breadcrumbs.brand.create"))
                ->show(__("breadcrumbs.brand.show"))
                ->edit(__("breadcrumbs.brand.edit"));
        });

    Route::resource('promocode', PromoCodeController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.promocodes.index"))
                ->create(__("breadcrumbs.promocodes.create"))
                ->show(__("breadcrumbs.promocodes.show"))
                ->edit(__("breadcrumbs.promocodes.edit"));
        });

    Route::resource('settings', SettingsController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.settings.index"))
                ->create(__("breadcrumbs.settings.create"))
                ->show(__("breadcrumbs.settings.show"))
                ->edit(__("breadcrumbs.settings.edit"));
        });

    Route::resource('static_content', StaticContentController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.static_content.index"))
                ->create(__("breadcrumbs.static_content.create"))
                ->show(__("breadcrumbs.static_content.show"))
                ->edit(__("breadcrumbs.static_content.edit"));
        });
    
    Route::resource('static_content_structure', StaticContentStructureController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.static_content_structure.index"))
                ->create(__("breadcrumbs.static_content_structure.create"))
                ->show(__("breadcrumbs.static_content_structure.show"))
                ->edit(__("breadcrumbs.static_content_structure.edit"));
        });

    Route::post('setting-update', [SettingsController::class, 'updateAll'])->name('setting.updateAll');

    Route::resource('translations', TranslationController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.translations.index"))
                ->create(__("breadcrumbs.translations.create"))
                ->show(__("breadcrumbs.translations.show"))
                ->edit(__("breadcrumbs.translations.edit"));
        });
    
    Route::resource('menu', MenuController::class)
        ->breadcrumbs(function (ResourceBreadcrumbs $breadcrumbs) {
            $breadcrumbs
                ->index(__("breadcrumbs.menu-builder.index"))
                ->create(__("breadcrumbs.menu-builder.create"))
                ->show(__("breadcrumbs.menu-builder.show"))
                ->edit(__("breadcrumbs.menu-builder.edit"));
        });

    Route::post('translation-update', [TranslationController::class, 'updateAjax'])->name('translation.update');


    Route::get('filemanager', [FileManagerController::class, 'index'])->name('filemanager.index');

    // Extra system routes
    Route::as('system')->name('system.')->prefix('system')->group(function () {
        Route::get('cache-clear', [SystemController::class, 'clearCache'])->name('cache.clear');
        Route::get('backup-list', [SystemController::class, 'backupList'])->name('backup.list');
        Route::post('backup-create', [SystemController::class, 'takeBackup'])->name('backup.create');
    });
});

require __DIR__ . '/auth.php';
