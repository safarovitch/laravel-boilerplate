<?php

namespace App\Http\Livewire;

use App\Models\Location;
use App\Models\ShippingMethod;
use Livewire\Component;

class WShippingZone extends Component
{
    public $zones, $methods;

    public function mount()
    {
        $this->zones = Location::pluck('title', 'id');
        $this->methods = ShippingMethod::pluck('title', 'id');
    }

    public function render()
    {
        return view('livewire.w-shipping-zone');
    }
}
