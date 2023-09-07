<?php

namespace App\DataTables;

use App\Models\Translation;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TranslationsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dtb =  datatables()
            ->eloquent($query)->setRowId('id');

        $raw = [];
        foreach (config('app.site_locales') as $code => $locale) {
            $flag = asset($locale['flag']);
            $dtb->editColumn($code, function ($translation) use ($code, $flag) {
                return
                    '<div class="input-group input-group-sm input-group-merge table-input-group">
                    <textarea onChange="updateRow(this);" id="apiKeyCode-' . $code . '" type="text" class="form-control form-control-sm" data-id="' . $translation->id . '" data-code="' . $code . '" name="text[' . $code . ']" rows="1">' . ($translation->text[$code] ?? '') . '</textarea>
                    <span class="js-clipboard input-group-append input-group-text">
                        <i class="bi bi-check2 d-none text-success fs-3 animated fadeOut p-2 saved"></i>
                        <img src="' . $flag . '" alt="' . $code . '" class="flag" width="18">
                    </span>
                  </div>';
            });
            $raw[] = $code;
        }



        return $dtb->rawColumns($raw);

        // ->editColumn('text', function($line){
        //     $view = '<div class="form-group">';
        //     foreach (config('app.site_locales') as $code => $locale) {
        //         $translation = $line->text[$code] ?? '';
        //         $flag = asset($locale['flag']);
        //         $view .= '<div class="input-group input-group-sm mb-2">
        //                     <span class="input-group-text px-2" id="addon-'.$code.'"><img src="'.$flag.'" width="22" alt="'.$locale['label'].'"/>&nbsp;&nbsp;'.$locale['label'].'</span>
        //                     <input type="text" class="form-control" aria-describedby="basic-addon-'.$code.' value="'.$translation.'">
        //                 </div>';
        //     }
        //     $view .= "</div>";

        //     $view = ($line->text[app()->getLocale()] ?? null) . ' <button class="btn btn-sm btn-link px-2 py-1" data-popup="language-editor" data-title="'.$line->group.'.'.$line->key.'" data-id="'.$line->id.'"><i class="bi bi-pencil"></i></button>';
        //     return $view;
        // })
        // ->rawColumns(['text'])
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Translation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Translation $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('language_lines')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("lTfrtip")
            ->orderBy(1)
            ->parameters([
                'initComplete' => 'function () {
                    this.api().columns().every(function () {
                       
                    });
                }',
            ])->addTableClass('table-striped table-hover table-fw-widget datatable');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $columns = [
            Column::make('id'),
            Column::make('group'),
            Column::make('key'),
        ];

        foreach (config('app.site_locales') as $code => $locale) {
            $columns[] = Column::make($code)->title($locale['label'])->orderable(false)->searchable(false);
        }

        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Translations_' . date('YmdHis');
    }
}
