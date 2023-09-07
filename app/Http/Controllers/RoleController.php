<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Role::all());
            $tableData->addColumn('actions', function ($role) {
                $r = "<div class='d-flex'>";
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('role.edit', $role).'"><i class="bi bi-pencil"></i></a>';
                $r .= "</div>";
                return $r;
            });
            return $tableData->rawColumns(['name','actions','status'])->make();
        }

        $dataTables = [
            ['data' => 'name', 'name' => 'name', 'title' => __("role.name")],
            ['data' => 'guard_name', 'name' => 'guard_name', 'title' => __("role.guard")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('role.index', compact('dataTables', 'dataOrder'));
    }

    public function edit(Role $role)
    {
        // dd($role->permissions()->pluck('name'));
        $permissions = Permission::get();
        return view('role.form', compact('role','permissions'));
    }
}
