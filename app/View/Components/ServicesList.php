<?php

namespace App\View\Components;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServicesList extends Component
{
    private $selectedServices;
    /**
     * Create a new component instance.
     */
    public function __construct($services = [])
    {
        $this->selectedServices = $services;
    }

    public function render()
    {
        $services = $this->getCategories(Service::get());
        $services = '<ul id="categoryTree">' . $services . '</ul>';
        return view('components.services-list', compact('services'));
    }

    private function getCategories($items)
    {
        $html = '';
        foreach ($items as $item) {
            $checked = in_array($item->id, $this->selectedServices->toArray()) ? 'checked' : '';
            $html .= '<li>';
            $html .= '<input type="checkbox" name="categories['.$item->id.']" data-id="category-'.$item->id.'" value="' . $item->id . '" '.$checked.'> ';
            $html .= $item->name;
            // if ($item->hasChildren()) {
            //     $html .= '<ul>';
            //     $html .= $this->getCategories($item->children);
            //     $html .= '</ul>';
            // }
            $html .= '</li>';
        }
        return $html;
    }
}
