<?php

namespace App\Http\Livewire;

use App\Models\Location;
use App\Models\ShippingMethod;
use Livewire\Component;

class WShippingMethod extends Component
{
    public $method;

    protected $rules = [
        'method.title.en' => 'required|min:6',
        'method.description.en' => 'nullable'
    ];

    public function mount($method = null)
    {
        $this->method = $method ?? new ShippingMethod();
    }

    public function render()
    {
        return view('livewire.w-shipping-method');
    }
}
