<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
// use Gabievi\Promocodes\Facades\Promocodes;
// use Gabievi\Promocodes\Models\Promocode;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PromoCodeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Promocode::with('users'));
            $tableData->editColumn('status', function($promocode){
                return $promocode->isExpired() ? 'Expired' : 'Available';
            });
            $tableData->addColumn('actions', function ($promocode) {
                $r = "<div class='d-flex justify-content-end'>";
                $r .= '<a class="btn btn-outline-primary btn-sm me-2" href="'.route('promocode.show', $promocode).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm me-2" href="'.route('promocode.edit', $promocode).'"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="'.route('promocode.destroy', $promocode).'" method="POST" onSubmit="return confirm(\''.__("confirmation.promocode.destroy").'\')">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });

            return $tableData->rawColumns(['actions', 'status'])->make();
        }

        $dataTables = [
            ['data' => 'code', 'name' => 'code', 'title' => __("promocodes.code")],
            ['data' => 'status', 'name' => 'status', 'title' => __("promocodes.status")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('promocode.index', compact('dataTables', 'dataOrder'));
    }


    public function create()
    {
        $products = Product::get();
        return view('promocode.form', compact('products'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'code' => 'required|unique:promocodes',
            'quantity' => 'required|numeric',
            'data' => 'required',
        ]);
        //dd($request->all());

        $extra = $request->input('data');
        if ($request->input('products') != null)
            $extra['products'] = implode(',', $request->input('products'));

        // $data = [
        //     'code' => $request->input('code'),
        //     'amount' => $request->input('quantity'),
        //     'reward' => null,
        //     'data' => $extra,
        //     'expires_in' => $request->input('expires_in'),
        //     'quantity' => $request->input('quantity'),
        //     'is_disposable' => $request->input('is_disposable') ?? 0,
        // ];

        // Promocodes::createDisposable(
        //     $amount = 1,
        //     $reward = null,
        //     $data = [],
        //     $expires_in = null,
        //     $quantity = null
        // )

        //$promocode = Promocode::create($data);
        $promocode = DB::table('promocodes')->insert([
            'code' => $request->input('code'),
            'quantity' => $request->input('quantity'),
            'reward' => null,
            'data' => json_encode($extra),
            'expires_at' => $request->input('expires_at'),
            'quantity' => $request->input('quantity'),
            'is_disposable' => $request->input('is_disposable') ?? 0,
        ]);

        // $promocode = Promocodes::createDisposable(
        //     $request->input('quantity'),
        //     null,
        //     $request->input('data'),
        //     $request->input('expires_in'),
        //     $request->input('quantity')
        // );

        // $promocode->code = $request->input('code');
        // $promocode->save();

        // if( isset($request->is_disposable) and $request->is_disposable == 1 ){
        //     Promocodes::createDisposable(
        //         $data
        //     );
        // }else{
        //     Promocodes::create(
        //         $data
        //     );
        // }

        return redirect()->route('promocode.index')->with('success', 'promocode$promocode Created Successfully');
    }

    public function edit(Promocode $promocode)
    {
        $products = Product::get();
        return view('promocode.form', compact('products', 'promocode'));
    }

    public function update(Request $request, Promocode $promocode)
    {
        $request->validate([
            'code' => 'required|unique:promocodes,id,' . $promocode->id,
            'quantity' => 'required|numeric',
            'data' => 'required',
        ]);

        $extra = $request->input('data');
        if ($request->input('products') != null)
            $extra['products'] = implode(',', $request->input('products'));

        $promocode = DB::table('promocodes')->where('id', $promocode->id)->update([
            'code' => $request->input('code'),
            'quantity' => $request->input('quantity'),
            'reward' => null,
            'data' => json_encode($extra),
            'expires_at' => $request->input('expires_at'),
            'quantity' => $request->input('quantity'),
            'is_disposable' => $request->input('is_disposable') ?? 0,
        ]);

        return redirect()->back()->with('success', 'promocode$promocode Updated Successfully');
    }

    public function destroy(Promocode $promocode)
    {
        $promocode->delete();
        return redirect()->route('promocode.index')->with('success', 'promocode$promocode Deleted Successfully');
    }
}
