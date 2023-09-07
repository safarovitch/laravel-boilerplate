<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Menu::query());
            $tableData->addColumn('name', function ($menu) {
                return '
                <a class="d-flex align-items-center" href="'.route('menu.edit', $menu).'">
                      <h5 class="text-inherit mb-0">'.$menu->name.'</h5>
                </a>';
            });
            $tableData->addColumn('actions', function ($menu) {
                $r = "<div class='d-flex'>";
                // $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('menu.show', $menu).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('menu.edit', $menu).'"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="'.route('menu.destroy', $menu).'" method="POST" onSubmit="return confirm(\''.__("confirmation.blog.brand.destroy").'\')">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });
            return $tableData->rawColumns(['name', 'actions'])->make();
        }
    
        $dataTables = [
            ['data' => 'name', 'name' => 'name', 'title' => __("menu-builder.title")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];
    
        $dataOrder = "[1, 'DESC']";
    
        return view('menu.index', compact('dataTables', 'dataOrder'));
    }

    public function create()
    {
        return view('menu.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'short_code' => "nullable",
            "active" => "nullable",
            'css' => 'nullable',
            "menu_items.*.title" => "required",
            "menu_items.*.url" => "required",
        ]);

        // dd($request->menu_items);

        $menu = Menu::create(array_merge($request->only(['name', 'short_code','css'], ['active' => (int)isset($request->active)])));

        $menuItems = [];
        foreach($request->menu_items as $item){
            $menuItems[] = new MenuItem([
                'title' => $item['title'],
                'url' => $item['url'],
                'icon' => $item['icon'] ?? '',
                'css' => $item['css'] ?? '',
                'type' => $item['type'] ?? '',
                'order' => $item['order'] ?? 0,
                'active' => (int)isset($item['active'])
            ]);
        }
        $menu->items()->saveMany($menuItems);

        if(request()->ajax()){
            return response()->json(['message' => __("menu-builder.menu.created"), 'redirect' => route('menu.edit', $menu)], 200);
        }

        return redirect()->route('menu.edit', $menu);
    }

    public function show(Menu $menu)
    {
        return view('menu.form', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('menu.form', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => "required",
            'short_code' => "nullable",
            "active" => "nullable",
            'css' => 'nullable',
            "menu_items.*.title" => "required",
            "menu_items.*.url" => "required",
        ]);

        $menu->update(array_merge($request->only(['name', 'short_code','css'], ['active' => (int)isset($request->active)])));

        $menuItems = [];
        if(isset($request->menu_items)){
            foreach($request->menu_items as $item){
                $menuItems[] = new MenuItem([
                    'id' => isset($item['id']) ? $item['id'] : null,
                    'title' => $item['title'],
                    'url' => $item['url'],
                    'icon' => $item['icon'] ?? '',
                    'css' => $item['css'] ?? '',
                    'type' => $item['type'] ?? '',
                    'order' => $item['order'] ?? 0,
                    'active' => (int)isset($item['active'])
                ]);
            }
            $menu->items()->delete();
            $menu->items()->saveMany($menuItems);
        }else{
            $menu->items()->delete();
        }

        if(request()->ajax()){
            return response()->json(['message' => __("menu-builder.menu.created"), 'redirect' => route('menu.edit', $menu)], 200);
        }

        return redirect()->route('menu.edit', $menu);
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->back();
    }
}
