<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryTree extends Component
{
    private $type;
    private $selectedCategories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $categories)
    {
        $this->type = $type;
        $this->selectedCategories = isset($categories) ?  $categories->pluck('id')->toArray() : [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = $this->getCategories(Category::main()->where('model_type', $this->type)->get());
        $categories = '<ul id="categoryTree">' . $categories . '</ul>';
        return view('components.category-tree', compact('categories'));
    }


    /**
     * Recursively get categories and children as html ul li with checkbox using $item->hasChildren()
     */

    private function getCategories($items)
    {
        $html = '';
        foreach ($items as $item) {
            $checked = in_array($item->id, $this->selectedCategories) ? 'checked' : '';
            $html .= '<li>';
            $html .= '<input type="checkbox" name="categories['.$item->id.']" data-id="category-'.$item->id.'" value="' . $item->id . '" '.$checked.'> ';
            $html .= $item->title;
            if ($item->hasChildren()) {
                $html .= '<ul>';
                $html .= $this->getCategories($item->children);
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
        return $html;
    }

}
