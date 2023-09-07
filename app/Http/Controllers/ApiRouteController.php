<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApiRouteController extends Controller
{

    public function __construct(Request $request)
    {
        app()->setLocale($request->header("Accept-Language"));
    }

    public function routeByType(Request $request, $type, $slug)
    {
        $segments = $request->segments();

        $type = Str::camel($type);

        $model = $this->getModelByType(Str::camel($type));
        $record = $model::where('slug->'.app()->getLocale(), $slug)->first();

        return response()->json([
            'request_segments' => $segments,
            'locale' => app()->getLocale(),
            'slug' => $record != null ? $record->slug : null,
            'type' => $type,
            'record_id' => $record != null ? $record->id : null,
        ]);
    }
    
    public function routeBySlug(Request $request, $slug)
    {
        $segments = $request->segments();

        [$table, $record] = $this->getModelBySlug($slug);

        return response()->json([
            'request_segments' => $segments,
            'locale' => app()->getLocale(),
            'slug' => $slug,
            'type' => Str::singular($table),
            'record_id' => $record != null ? $record->id : null,
        ]);
    }


    public function routeVariation(Request $request, ProductVariation $productVariation)
    {
        $segments = $request->segments();

        $product = $productVariation->product;
        $table = $productVariation->getTable();

        return response()->json([
            'request_segments' => $segments,
            'locale' => app()->getLocale(),
            'type' => Str::singular($table),
            'record_id' => $productVariation != null ? $productVariation->id : null,
            'product' => [
                'record_id' => $product->id,
                'type' => Str::singular($product->getTable())
            ]
        ]);
    }

    public function getModelByType($model)
    {
        $model = ucfirst($model);
        $model = "App\\Models\\{$model}";
        return new $model;
    }

    public function getModelBySlug($slug) : array
    {
        // find which table and record this slug belongs to by going through tables
        $record = null;
        $table = null;
        foreach(['products', 'posts', 'categories', 'static_contents'] as $table) {
            if($table == 'static_contents'){
                if(DB::table($table)->where('slug', $slug)->where('locale',app()->getLocale())->exists()){
                    $record = DB::table($table)->where('slug', $slug)->where('locale',app()->getLocale())->first();
                    break;
                }    
            }elseif(DB::table($table)->where('slug->'.app()->getLocale(), $slug)->exists()){
                $record = DB::table($table)->where('slug->'.app()->getLocale(), $slug)->first();
                break;
            }
        }

        return [$table, $record];
    }
}
