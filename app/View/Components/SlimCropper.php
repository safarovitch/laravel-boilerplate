<?php

namespace App\View\Components;

use App\Enums\ImageSize;
use Illuminate\View\Component;

class SlimCropper extends Component
{
    public $field, $size, $image, $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field = 'featured_image', $size = null, $image = null, $options = null)
    {
        $this->field = $field;
        $this->size = $size ?? ImageSize::PRODUCT_FEATURED_IMAGE_SIZE;
        $this->image = $image;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slim-cropper');
    }
}
