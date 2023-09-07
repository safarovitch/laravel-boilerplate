<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use League\Glide\Server;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Service::query());
            $tableData->addColumn('name', function ($service) {
                return $service->name;
            });
            $tableData->addColumn('actions', function ($service) {
                $r = "<div class='d-flex'>";
                // $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('service.show', $service).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm me-2" href="' . route('service.edit', $service) . '"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="' . route('service.destroy', $service) . '" method="POST" onSubmit="return confirm(\'' . __("confirmation.blog.service.destroy") . '\')">' . csrf_field() . method_field('delete') . '<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });
            return $tableData->rawColumns(['actions'])->make();
        }

        $dataTables = [
            ['data' => 'name', 'name' => 'name', 'title' => __("service.title")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('service.index', compact('dataTables', 'dataOrder'));
    }


    public function create()
    {
        return view('service.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $service = Service::create($request->only('name', 'description'));

        return response()->json(['redirect' => route('service.edit', $service)]);
    }

    public function edit(Service $service)
    {
        return view('service.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $service->update($request->only('name', 'description'));

        return response()->json(['message' => __('service.updated')]);
    }
}
