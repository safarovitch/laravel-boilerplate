<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tag extends Component
{
    public $taggable;
    public $selectedTags;
    public $model;
    public $field;
    public $empty;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($taggable, $tags, $model, $field, $empty = null)
    {
        $this->taggable = $taggable;
        $this->selectedTags = isset($tags) ?  $tags->pluck('id')->toArray() : [];
        $this->model = $model;
        $this->field = $field;
        $this->empty = $empty;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tags = $this->model::get();
        return view('components.tag', compact('tags'));
    }
}
