<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Brand::query());
            $tableData->addColumn('title', function ($brand) {
                return '
                <a class="d-flex align-items-center" href="'.route('brand.edit', $brand).'">
                    <div class="flex-shrink-0">
                      <img class="avatar avatar-lg" src="'.$brand->logo.'" alt="'.$brand->name.'">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="text-inherit mb-0">'.$brand->name.'</h5>
                    </div>
                </a>';
            });
            $tableData->addColumn('actions', function ($brand) {
                $r = "<div class='d-flex'>";
                // $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('brand.show', $brand).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('brand.edit', $brand).'"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="'.route('brand.destroy', $brand).'" method="POST" onSubmit="return confirm(\''.__("confirmation.blog.brand.destroy").'\')">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });
            return $tableData->rawColumns(['title', 'actions'])->make();
        }

        $dataTables = [
            ['data' => 'title', 'name' => 'title', 'title' => __("brand.title")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('product.brand.index', compact('dataTables', 'dataOrder'));
    }

    public function create()
    {
        return view('product.brand.form');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'catalog_url' => 'nullable',
            'owner_manual_url' => 'nullable',
        ]);

        $brand = Brand::create($request->only('name', 'description', 'catalog_url', 'owner_manual_url'));

        return response()->json(['redirect' => route('brand.edit', $brand)]);
    }

    public function edit(Brand $brand)
    {
        return view('product.brand.form', compact('brand'));
    }

    public function update(Request $request, Brand $brand) {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'catalog_url' => 'nullable',
            'owner_manual_url' => 'nullable',
        ]);

        $brand->update($request->only('name', 'description', 'catalog_url', 'owner_manual_url'));

        return response()->json(['message' => __('brand.updated')]);
    }
}
