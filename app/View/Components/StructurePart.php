<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StructurePart extends Component
{
    public $part, $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($part, $item = null)
    {
        $this->part = $part;
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.structure-part');
    }
}
