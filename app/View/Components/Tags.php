<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Spatie\Tags\Tag;

class Tags extends Component
{
    public $taggable;
    public $selectedTags;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($taggable, $tags)
    {
        $this->taggable = $taggable;
        $this->selectedTags = isset($tags) ?  $tags->pluck('id')->toArray() : [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tags = Tag::get();
        return view('components.tags', compact('tags'));
    }
}
