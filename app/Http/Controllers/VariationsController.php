<?php

namespace App\Http\Controllers;

use App\Enums\InputType;
use App\Models\Variation;
use App\Models\VariationOption;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VariationsController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Variation::all());
            $tableData->addColumn('title', function ($variation) {
                return $variation->name;
            });

            $tableData->addColumn('variations', function ($variation) {
                $r= '<a class="btn btn-primary btn-sm mr-2" href="' . route('variation.edit', $variation) . '">'.__("variation.variations").'</a>';
                return $r;
            });
            
            $tableData->addColumn('actions', function ($variation) {
                $r = "<div class='d-flex'>";
                // $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('post.show', $post).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="' . route('variation.edit', $variation) . '"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="' . route('variation.destroy', $variation) . '" method="POST" onSubmit="return confirm(\'' . __("confirmation.variation.destroy") . '\')">' . csrf_field() . method_field('delete') . '<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });
            $tableData->addColumn('status', function ($variation) {
                return $variation->status;
            });
            return $tableData->rawColumns(['actions'])->make();
        }

        $dataTables = [
            ['data' => 'title', 'name' => 'title', 'title' => __("variation.title")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('variation.index', compact('dataTables', 'dataOrder'));
    }


    public function create()
    {
        return view('variation.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:variations',
            'type' => 'required',
            'variation_option' => 'required'
        ]);

        $variation = Variation::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        foreach ($request->variation_option as $option) {
            VariationOption::create([
                'label' => $option['label'],
                'type'  => $option['type'],
                'value' => $option['value'],
                'variation_id' => $variation->id
            ]);
        }

        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'message' => __('message.product.created')]);
        }

        return redirect()->route('variation.show', $variation)->with('success', __('variation.created'));
    }

    public function update(Request $request, variation $variation)
    {
        // dd( $request->all() );
        $request->validate([
            'name' => 'required|unique:variations,id,' . $variation->id,
            'type' => 'required',
            'variation_options' => 'required'
        ]);

        // dd($request->all());

        $variation->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        foreach ($request->variation_options as $option) {
            VariationOption::updateOrCreate([
                'label' => $option['label'],
                'variation_id' => $variation->id
            ],[
                'label' => $option['label'],
                'type'  => trim($option['type']),
                'value' => $option['value'],
                'variation_id' => $variation->id
            ]);
        }


        return redirect()->back();
    }

    public function edit(variation $variation)
    {
        return view('variation.form', compact('variation'));
    
    }

    public function show(variation $variation)
    {
        return view('variation.form', compact('variation'));
    }

      /***
     * 
     * Load custom variation item template for variation type
     */
    public function loadVariationOptionTemplate(Request $request)
    {

        $type = $request->type ?? InputType::TEXT;
        $variation = $request->variation != null ? Variation::find($request->variation) : null;
        $view = 'variation.repeater-items.input';

        //return $view;
        if (view()->exists($view)) {
            return view($view, compact('variation'));
        }
        return "";
    }


    /***
     * 
     * Delete variation option from database
     */
    public function deleteVariationOption(Request $request, $variation_id, $variation_option_id)
    { 
        $variation = Variation::findOrFail($variation_id);
        $variation->variations()->findOrFail($variation_option_id)->delete();
        return response()->json(['success' => true, 'message' => 'Variation deleted successfully']);
    }

    public function destroy(Variation $variation)
    {
        $variation->delete();
        return redirect()->route('variation.index')->with('success', __('variation.deleted'));
    }
}
