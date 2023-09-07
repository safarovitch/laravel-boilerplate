<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Variation;
use Illuminate\View\Component;

class ProductVariations extends Component
{
    public Product $product;
    public $variations;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->variations = Variation::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-variations');
    }
}
