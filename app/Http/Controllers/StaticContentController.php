<?php

namespace App\Http\Controllers;

use App\Enums\StaticContentTypes;
use App\Models\StaticContent;
use App\Models\StaticContentItem;
use App\Models\StaticContentItemPart;
use App\Models\StaticContentStructure;
use App\Models\StructurePart;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StaticContentController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(StaticContent::query());
            $tableData->addColumn('title', function ($page) {
                $title = substr(strip_tags($page->name), 0, 50);
                return $title;
            });
            $tableData->addColumn('status', function ($page) {
                return getStatusHtml($page->active ? 'active' : 'inactive');
            });
            $tableData->addColumn('structure', function ($page) {
                $structure = "<a href='".route('static_content_structure.edit', $page->structure)."'>".$page->structure->name."</a>";
                return $page->structure->multiple ? "Multiple ".$structure : $structure;
            });
            $tableData->editColumn('locale', function($page){
                return isset(config('app.site_locales')[$page->locale]) ? config('app.site_locales')[$page->locale]['label'] : '';
            });
            $tableData->editColumn('slug', function($page){
                return $page->slug;
            });
            $tableData->addColumn('actions', function ($page) {
                $r = "<div class='d-flex'>";
                // $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('page.show', $page).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('static_content.edit', $page).'"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="'.route('static_content.destroy', $page).'" method="POST" onSubmit="return confirm(\''.__("confirmation.blog.page.destroy").'\')">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });
            return $tableData->rawColumns(['title','actions', 'status', 'structure'])->make();
        }

        $dataTables = [
            ['data' => 'title', 'name' => 'title', 'title' => __("static_content.title")],
            ['data' => 'slug', 'name' => 'slug', 'title' => __("static_content.slug")],
            ['data' => 'locale', 'name' => 'locale', 'title' => __("static_content.locale")],
            ['data' => 'status', 'name' => 'status', 'title' => __("static_content.status")],
            ['data' => 'structure', 'name' => 'structure', 'title' => __("static_content.structure")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[1, 'DESC']";

        return view('static-content.index', compact('dataTables', 'dataOrder'));
    }


    public function create()
    {
        $structures = StaticContentStructure::pluck('id', 'name');
        return view('static-content.form', compact('structures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'structure_id' => 'required',
            'name' => 'required',
            'slug' => 'nullable',
            'description' => 'nullable',
            'locale' => 'required'
        ]);

        $static_content = StaticContent::create($request->only(['structure_id','slug', 'name','description', 'locale']));

        return redirect()->route('static_content.edit', $static_content);
    }

    public function edit(StaticContent $static_content)
    {
        $structures = StaticContentStructure::pluck('id', 'name');
        return view('static-content.form', compact('structures', 'static_content'));
    }

    public function update(Request $request, StaticContent $static_content)
    {
        $request->validate([
            'structure_id' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'locale' => 'required',
            'slug' => 'nullable'
        ]);
        
        $static_content->update(array_merge(
            $request->only(['structure_id','slug', 'name','description', 'locale']), 
            ['active' => $request->has('active')])
        );

        if( $request->has('content_items') ){
            // Deletion of items will cause change of id on every update of content
            $static_content->items()->delete();
            foreach($request->content_items as $contentItem){
                $staticContentItem = StaticContentItem::updateOrCreate([
                    'content_id' => $static_content->id,
                    'id' => $contentItem['id'] ?? null
                ],[
                    'content_id' => $static_content->id,
                    'order' => $contentItem['order'] ?? 0
                ]);

                foreach($contentItem['item_parts'] as $part){
                    $part = (object) $part;
                    $partType = StructurePart::find($part->part_type_id);
                    if($partType){
                        if( $partType->type == StaticContentTypes::ACTION){
                            $partValue = [$part->title ?? '', $part->url ?? ''];
                        }elseif( $partType->type == StaticContentTypes::IMAGE_CROPPER ){
                            // handle image cropper upload
                            if($part->value != null and $part->value != ''){
                                // Process image
                                $file = uploadSlimImageNoRequest($part->value, 'value');
                                $partValue = $file['value'];
                            }
                        }else{
                            $partValue = $part->value ?? null;
                        }
                        StaticContentItemPart::updateOrCreate([
                            'content_item_id' => $staticContentItem->id,
                            'name' => $part->name ?? $partType->name,
                            'type' => $part->type ?? $partType->type
                        ],[
                            'value' => $partValue != null ? json_encode($partValue) : null,
                            'structure_part_id' => $partType->id 
                        ]);
                    }
                }
            }
        }else{
            $static_content->items()->delete();
        }
        
        return redirect()->back()->with(['message' => __("static_content.updated")]);
    }


    public function destroy(StaticContent $staticContent)
    {
        $staticContent->delete();
        if(request()->ajax())
            return response()->json(['message'=>__("message.content.deleted")], 200);
        return redirect()->route('static_content.index');
    }
}
