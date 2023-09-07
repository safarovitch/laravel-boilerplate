<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Variation;
use League\Fractal\Resource\Collection;
use Livewire\Component;

class ProductVariationsV2 extends Component
{
    public Product $product;
    public $availableVariations;
    public $selectedVariationOptions;
    public $selectedVariations;
    public $variations;

    public $rules = [
        'selectedVariationOptions.*.*' => 'nullable',
    ];
    
    public function mount(Product $product)
    {
        $this->product = $product;
        $this->availableVariations = Variation::get();

        if($this->product->exists){
            $this->selectedVariationOptions = $this->product->variationOptions;
        }

        $this->variations = collect();
    }

    public function render()
    {
        return view('livewire.product-variations-v2');
    }

    public function addVariation()
    {
        $this->variations->add(Variation::get());
    }
}
