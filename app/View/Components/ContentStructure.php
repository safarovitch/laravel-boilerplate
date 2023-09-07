<?php

namespace App\View\Components;

use App\Models\StaticContentStructure;
use Illuminate\View\Component;

class ContentStructure extends Component
{

    public $structure, $item;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($structure, $item = null)
    {
        $this->structure = StaticContentStructure::find($structure);
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content-structure');
    }
}
