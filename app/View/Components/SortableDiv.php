<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortableDiv extends Component
{
    public $items;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items, $id = '0')
    {
        $this->items = $items;
        $this->id = 'sortableItemsGroup'.$id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sortable-div');
    }
}
