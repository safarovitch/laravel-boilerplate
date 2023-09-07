<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return array_merge([
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'model' => 'Category',
            'menu_icon' => $this->menu_icon,
            'deleted_at' => $this->deleted_at,
            // 'products' => CategoryProductResource::collection($this->products()->paginate(15)),
            'parent' => CategoryResource::make($this->parent),
        ]);
    }
}
