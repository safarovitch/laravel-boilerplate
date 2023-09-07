<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'model_type' => 'required',
            'name' => 'required',
            'slug' => 'nullable',
            'parent_id' => 'nullable',
            'menu_icon' => 'nullable',
        ]);

        $category = Category::firstOrCreate([
            'model_type' => $request['model_type'],
            'title' => $request['name'],
        ],[
            'parent_id' => $request['parent_id'] ?? null,
            'menu_icon' => $request['menu_icon'] ?? ''
        ]);

        if(isset($request->children))
        foreach($request->children as $child){
            Category::firstOrCreate([
                'model_type' => $child['model_type'],
                'title' => $child['name'],
            ],[
                'parent_id' => $category->id,
                'menu_icon' => $child['menu_icon'] ?? ''
            ]);
        }

        return response()->json(['message' => 'Category saved!'], 200);
    }
    
    public function storeAll(Request $request)
    {
        foreach ($request->all() as $category) {
            $request = new Request($category);
            $this->store($request);
        }
    }
}
