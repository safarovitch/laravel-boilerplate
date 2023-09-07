<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $variants = $this->variationOptions()->whereHas('value')->with('variation')->get()->each(function ($variation) {
            return $variation->value;
        });

        $data = array_merge( parent::toArray($request), [
            'featured_image' => new ProductImageResource($this->featuredImage()),
            'gallery_images' => ProductImageResource::collection($this->gallery()),
            'brand' => $this->brand()->exists() ? $this->brand : null,
            'categories' => ProductCategoryResource::collection($this->categories),
            'tags' => $this->tags,
            'attributes' => ProductAttributeResource::collection($this->attributes),
            'variants' => ProductVariationResource::collection($variants),
        ]);
        return $data;
    }
}
