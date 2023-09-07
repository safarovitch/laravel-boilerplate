<?php

namespace App\Http\Controllers;

use App\DataTables\CustomDataTable;
use App\DataTables\TranslationsDataTable;
use App\DataTables\TranslationsDataTableEditor;
use App\Enums\UserRole;
use App\Models\Translation;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;
use Yajra\DataTables\Facades\DataTables;

class TranslationController extends Controller
{

    // public function index(TranslationsDataTable $dataTable)
    // {
    //     return $dataTable->render('translations.table');
    // }

    public function index()
    {
        if (request()->ajax()) {
            $translations = LanguageLine::all();
            $rawColumns = [];
            $dtb = DataTables::of($translations);

            if( auth()->user()->hasRole(UserRole::ADMIN) ){

                $dtb->editColumn('group', function ($translation) {
                    return
                        '<div class="input-group input-group-sm input-group-merge table-input-group">
                                <textarea onChange="updateRow(this);" type="text" class="form-control form-control-sm" data-id="' . $translation->id . '" data-code="group" name="group" rows="1">' . ($translation->group ?? '') . '</textarea>
                                <span class="js-clipboard input-group-append input-group-text">
                                    <i class="bi-check d-none text-success fs-3 animated fadeOut p-0 saved"></i>
                                    <i class="d-none spinner-border-sm spinner-border text-success animated fadeOut p-0 saving"></i>
                                </span>
                            </div>';
                });

                $dtb->editColumn('key', function ($translation) {
                    return
                        '<div class="input-group input-group-sm input-group-merge table-input-group">
                                <textarea onChange="updateRow(this);" type="text" class="form-control form-control-sm" data-id="' . $translation->id . '" data-code="key" name="key" rows="1">' . ($translation->key ?? '') . '</textarea>
                                <span class="js-clipboard input-group-append input-group-text">
                                    <i class="bi-check d-none text-success fs-3 animated fadeOut p-0 saved"></i>
                                    <i class="d-none spinner-border-sm spinner-border text-success animated fadeOut p-0 saving"></i>
                                </span>
                            </div>';
                });

                $rawColumns[] = 'group';
                $rawColumns[] = 'key';
            }


            foreach (config('app.site_locales') as $code => $locale) {
                $dtb->addColumn($locale['label'], function ($translation) use ($code) {
                    return
                        '<div class="input-group input-group-sm input-group-merge table-input-group">
                            <textarea onChange="updateRow(this);" id="apiKeyCode-' . $code . '" type="text" class="form-control form-control-sm" data-id="' . $translation->id . '" data-code="' . $code . '" name="text[' . $code . ']" rows="1">' . ($translation->text[$code] ?? '') . '</textarea>
                            <span class="js-clipboard input-group-append input-group-text">
                                <i class="bi-check d-none text-success fs-3 animated fadeOut p-0 saved"></i>
                                <i class="d-none spinner-border-sm spinner-border text-success animated fadeOut p-0 saving"></i>
                            </span>
                        </div>';
                });
                $rawColumns[] = $locale['label'];
            }

            return $dtb->rawColumns($rawColumns)->make();
        }

        $dataTables = [
            ['data' => 'group', 'name' => 'group', 'title' => __("translations.group")],
            ['data' => 'key', 'name' => 'key', 'title' => __("translations.key")],
        ];
        foreach (config('app.site_locales') as $code => $locale) {
            $dataTables[] = ['data' => $locale['label'], 'name' => $locale['label'], 'title' => $locale['label']];
        }

        $dataOrder = "[1, 'DESC']";

        return view('translations.index', compact('dataTables', 'dataOrder'));

        // if (request()->ajax()) {
        //     $rawColumns = [];
        //     $tableData = DataTables::of(LanguageLine::all());
        //     foreach( config('app.site_locales') as $code => $locale ){
        //         $rawColumns[] = $locale['label'];
        //         $tableData->addColumn($locale['label'], function($translation) use ($code, $locale){
        //             $flag = asset($locale['flag']);
        //             $r = '<div class="input-group input-group-sm input-group-merge table-input-group">
        //             <textarea onChange="updateRow(this);" id="apiKeyCode-' . $code . '" type="text" class="form-control form-control-sm" data-id="' . $translation->id . '" data-code="' . $code . '" name="text[' . $code . ']" rows="1">' . ($translation->text[$code] ?? '') . '</textarea>
        //             <span class="js-clipboard input-group-append input-group-text">
        //                 <i class="bi bi-check2 d-none text-success fs-3 animated fadeOut p-2 saved"></i>
        //                 <img src="' . $flag . '" alt="' . $code . '" class="flag" width="18">
        //             </span>
        //           </div>';
        //           return $r;
        //         });
        //     }
        //     return $tableData->rawColumns($rawColumns)->make();
        // }

        // $dataTables = [
        //     ['data' => 'id', 'name' => 'id', 'title' => __("main.id")],
        //     ['data' => 'group', 'name' => 'group', 'title' => __("translations.group")],
        //     ['data' => 'key', 'name' => 'key', 'title' => __("translations.key")],
        // ];

        // foreach( config('app.site_locales') as $code => $locale ){
        //     $dataTables[] = ['data' => $locale['label'], 'name' => $code, 'title' => $locale['label']];
        // }

        // $dataOrder = "[1, 'DESC']";

        // return view('translations.index', compact('dataTables', 'dataOrder'));
    }

    // public function index()
    // {
    //     $groupLanguages = LanguageLine::all()->groupBy('group');
    //     return view('translations.index', compact('groupLanguages'));
    // }

    public function create()
    {
        $languageGroups = LanguageLine::select('group')->distinct()->get();
        return view('translations.create', compact('languageGroups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group' => 'required',
            'key' => 'required',
            'text' => 'required',
        ]);

        LanguageLine::create($request->all());

        return redirect()->route('translations.index')->with('success', trans('admin.translations.created'));
    }

    public function edit(LanguageLine $languageLine)
    {
        $languageGroups = LanguageLine::select('group')->distinct()->get();
        return view('translations.edit', compact('languageGroups', 'languageLine'));
    }


    public function update(Request $request, LanguageLine $languageLine)
    {
        $request->validate([
            'group' => 'required',
            'key' => 'required',
            'text' => 'required',
        ]);

        $languageLine->update($request->all());

        return redirect()->route('translations.index')->with('success',trans('admin.translations.updated'));
    }

    public function updateAjax(Request $request)
    {
        $lineId = $request->input('id');
        $line = LanguageLine::find($lineId);
        $locale = $request->input('locale');
        $value = $request->input('value');

        if ($locale == 'key' || $locale == 'group') {
            $line->$locale = $value;
            $line->save();
        } else {

            $text = $line->text;

            $text[$locale] = $value;
            $line->text = $text;

            $line->save();
        }

        return response()->json(200);
    }
}
