<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileUpload extends Component
{
    public $files, $model, $field;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model = null, $field)
    {
        $this->model = $model;
        $this->field = $field;
        $this->files = $model != null ? $model->getMedia($field) : [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file-upload');
    }
}
