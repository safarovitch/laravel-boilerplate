<?php

namespace App\Http\Controllers;

use App\Enums\InputType;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AttributeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Attribute::query());
            $tableData->addColumn('name', function ($attribute) {
                return $attribute->name;
            });
            $tableData->addColumn('actions', function ($attribute) {
                $r = "<div class='d-flex'>";
                // $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('attribute.show', $attribute).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('attribute.edit', $attribute).'"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="'.route('attribute.destroy', $attribute).'" method="POST" onSubmit="return confirm(\''.__("confirmation.blog.attribute.destroy").'\')">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });
            return $tableData->rawColumns(['actions'])->make();
        }

        $dataTables = [
            ['data' => 'name', 'name' => 'name', 'title' => __("attribute.title")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('attribute.index', compact('dataTables', 'dataOrder'));
    }

    public function create()
    {
        return view('attribute.form');
    }

    public function store(Request $request)
    {

    }

    public function edit(Attribute $attribute)
    {
        return view('attribute.form', compact('attribute'));
    }

    public function update(Request $request, Attribute $attribute)
    {
        
    }

    public function loadOptionTemplate(Request $request)
    {
        $type = $request->type ?? InputType::TEXT;
        $attribute = $request->attribute != null ? Attribute::find($request->attribute) : null;
        $view = 'attribute.repeater-items.input';

        //return $view;
        if (view()->exists($view)) {
            return view($view, compact('attribute'));
        }
        return "";
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return redirect()->route('attribute.index')->with('success', __('message.attribute.deleted'));
    }
}
