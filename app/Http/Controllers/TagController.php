<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Tag::all());

            $tableData->editColumn('name', function($tag){
                return $tag->name;
            });

            $tableData->editColumn('slug', function($tag){
                return $tag->slug;
            });

            $tableData->addColumn('actions', function ($product) {
                $r = "<div class='d-flex'>";
                // $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('product.show', $product).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('tag.edit', $product).'"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="'.route('tag.destroy', $product).'" method="POST" onSubmit="return confirm(\''.__("confirmation.blog.product.destroy").'\')">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });

            return $tableData->rawColumns(['actions'])->make();
        }

        $dataTables = [
            ['data' => 'name', 'name' => 'name', 'title' => __("tag.title")],
            ['data' => 'slug', 'name' => 'slug', 'title' => __("tag.slug")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[]";

        return view('product.tag.index',compact('dataTables', 'dataOrder'));
    }
}
