<?php

namespace App\Http\Controllers;

use App\Models\ShippingClass;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ShippingClassController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(ShippingClass::query());
            $tableData->addColumn('title', function ($class) {
                return $class->title;
            });
            $tableData->addColumn('actions', function ($class) {
                $r = "<div class='d-flex'>";
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('shipping_class.edit', $class).'"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="'.route('shipping_class.destroy', $class).'" method="POST" onSubmit="return confirm(\''.__("confirmation.blog.class.destroy").'\')">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });
            return $tableData->rawColumns(['title','actions'])->make();
        }

        $dataTables = [
            ['data' => 'title', 'name' => 'title', 'title' => __("shipping_class.title")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('product.shipping_class.index', compact('dataTables', 'dataOrder'));
    }

    public function create()
    {
        return view('product.shipping_class.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'cost' => 'required',
        ]);

        $shippingClass = new ShippingClass($request->all());
        $shippingClass->save();
        return redirect()->route('product_class.show', $shippingClass);
    }

    public function edit(ShippingClass $shippingClass)
    {
        return view('product.shipping_class.form', compact('shippingClass'));
    }

    public function update(Request $request, ShippingClass $shippingClass)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'cost' => 'required',
        ]);

        $shippingClass->update($request->all());
        return redirect()->route('product_class.show', $shippingClass);
    }
}
