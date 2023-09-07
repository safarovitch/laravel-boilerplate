<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Order::query());

            $tableData->editColumn('date', function($order){
                return $order->created_at->format('M D Y');
            });
            
            $tableData->addColumn('status', function ($order) {
                return getStatusHtml($order->status);
            });

            $tableData->editColumn('customer', function($order){
                return $order->customer->name;
            }); 

            $tableData->addColumn('actions', function ($order) {
                $r = "<div class='d-flex'>";
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('order.show', $order).'"><i class="bi bi-eye"></i></a>';
                $r .= "</div>";
                return $r;
            });
            
            return $tableData->rawColumns(['title','actions', 'status'])->make();
        }

        $dataTables = [
            ['data' => 'id', 'name' => 'id', 'title' => __("order.id")],
            ['data' => 'date', 'name' => 'date', 'title' => __("order.date")],
            ['data' => 'customer', 'name' => 'customer', 'title' => __("product.customer")],
            ['data' => 'total', 'name' => 'total', 'title' => __("order.total_price")],
            ['data' => 'status', 'name' => 'status', 'title' => __("product.status")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('order.index', compact('dataTables', 'dataOrder'));
    }

    public function show(Order $order)
    {
        return view('order.details', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        if(request()->json()){
            return response()->json(['message'=>'Order Status Updated!'], 200);
        }
    }
}
