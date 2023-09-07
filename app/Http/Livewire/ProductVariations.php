<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Variation;

class ProductVariations extends Component
{

    public $product;
    public $productVariations;
    public $productVariationOptions;
    public $variations;
    public $variationOptions = [];

    public function mount($product = null)
    {
        $this->product = $product;
        $this->variations = Variation::get();
        $this->productVariations = [Variation::get()];

        if( $product->exists ){
            $this->productVariations = $product->variations ?? [Variation::get()];
            $this->productVariationOptions = $product->variations;
        }
    }

    public function render()
    {
        if( $this->product->exists ) 
            return view('livewire.product-variations-edit');
        return view('livewire.product-variations-create');
    }

    public function addProductVariation()
    {
        $this->productVariations[] = Variation::get();
    }

    public function removeProductVariation($key)
    {
        unset($this->productVariations[$key]);
    }

    public function updatedProductVariations($name, $value)
    {
        if (empty($name)) return;
        $this->variationOptions[$value] = Variation::find($name)->options->toArray();
    }

    public function selectAll($key)
    {
        if( isset($this->variationOptions[$key]) && ( !isset($this->productVariationOptions[$key]) || ($this->productVariationOptions[$key] != $this->variationOptions[$key]) ) ){
            $this->productVariationOptions[$key] = $this->variationOptions[$key];
        }else{
            $this->productVariationOptions[$key] = [];
        }
    }
}
