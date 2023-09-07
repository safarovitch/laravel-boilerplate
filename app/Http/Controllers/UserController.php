<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\DumbPersonalAccessToken;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Role::findByName(UserRole::ADMIN())->users());
            $tableData->addColumn('actions', function ($user) {
                $r = "<div class='d-flex'>";
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('user.edit', $user).'"><i class="bi bi-pencil"></i></a>';
                $r .= "</div>";
                return $r;
            });
            $tableData->editColumn('role', function($user){
                return $user->roles()->first()->name;
            });
            $tableData->editColumn('name', function($user){
                return '
                <a class="d-flex align-items-center" href="'.route('user.edit', $user).'">
                    <div class="avatar avatar-circle">
                      <img class="avatar-img" src="'.$user->image.'" alt="'.$user->name.'">
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">'.$user->name.'</span>
                      <span class="d-block fs-5 text-body">'.$user->email.'</span>
                    </div>
                  </a>';
            });
            $tableData->editColumn('status', function($user){
                return getStatusHtml($user->status);
            });
            return $tableData->rawColumns(['name','actions','status'])->make();
        }

        $dataTables = [
            ['data' => 'name', 'name' => 'name', 'title' => __("user.name")],
            ['data' => 'role', 'name' => 'role', 'title' => __("user.role")],
            ['data' => 'status', 'name' => 'status', 'title' => __("user.status")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('user.index', compact('dataTables', 'dataOrder'));
    }

    public function edit(User $user)
    {
        return view('user.form', compact('user'));
    }

    public function generateApiToken(User $user)
    {
        $tokenText = $user->createToken('General Token')->plainTextToken;
        $token = DumbPersonalAccessToken::findToken($tokenText);
        $token->update(['plain_text_token' => $tokenText]);
        return response()->json(['message' => "Token Generated", 'token' => $token, 'plain' => $tokenText], 200);
    }

}
