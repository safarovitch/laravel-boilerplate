<?php

namespace App\Http\Controllers;

use App\Models\StaticContentStructure;
use App\Models\StructurePart;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StaticContentStructureController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(StaticContentStructure::query());
            $tableData->addColumn('title', function ($page) {
                $title = substr(strip_tags($page->name), 0, 50);
                return $title;
            });
            $tableData->addColumn('status', function ($page) {
                return getStatusHtml($page->status);
            });
            $tableData->addColumn('actions', function ($page) {
                $r = "<div class='d-flex'>";
                // $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('page.show', $page).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('static_content_structure.edit', $page).'"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="'.route('static_content_structure.destroy', $page).'" method="POST" onSubmit="return confirm(\''.__("confirmation.blog.page.destroy").'\')">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });
            return $tableData->rawColumns(['title','actions', 'status'])->make();
        }

        $dataTables = [
            ['data' => 'title', 'name' => 'title', 'title' => __("static_content_structure.title")],
            ['data' => 'status', 'name' => 'status', 'title' => __("static_content_structure.status")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('static-content.structure.index', compact('dataTables', 'dataOrder'));
    }

    public function create()
    {
        return view('static-content.structure.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $structure = StaticContentStructure::create(array_merge($request->only([
            'name',
            'description'
        ]),[
            'multiple' => $request->has('multiple')
        ]));

        return redirect()->route('static_content_structure.edit', $structure)->with(['message' => __("static_content_structure.structure_saved")]);
    }

    public function edit(StaticContentStructure $static_content_structure)
    {
        return view('static-content.structure.form', compact('static_content_structure'));
    }

    public function update(Request $request, StaticContentStructure $static_content_structure)
    {
        $request->validate([
            'name' => 'required',
            'structure_parts.*.name' => 'required', 
            'structure_parts.*.type' => 'required', 
        ]);

        $static_content_structure->update(array_merge($request->only([
            'name',
            'description',
        ]),[
            'multiple' => $request->has('multiple')
        ]));

        foreach($request->structure_parts as $part){

            StructurePart::updateOrCreate([
                'structure_id' => $static_content_structure->id,
                'id' => $part['id'] ?? null
            ],[
                'name' => $part['name'],
                'type' => $part['type'],
                'options' => $part['options'] ?? null
            ]);
        }

        return redirect()->back()->with(['message' => __("static_content_structure.structure_updated")]);
    }
}
