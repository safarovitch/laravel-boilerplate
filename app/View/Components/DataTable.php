<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Locale;

class DataTable extends Component
{
    public $dataTables, $dataOrder, $title, $locale;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($table, $order = "[0, 'ASC']", $title = '')
    {
        $this->dataTables = $table;
        $this->dataOrder = $order;
        $this->title = $title;
        $this->locale = Locale::getDisplayLanguage(app()->getLocale(), 'en');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.data-table');
    }
}
