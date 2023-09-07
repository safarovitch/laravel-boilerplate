<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'option_id' => $this->id,
            'name' => $this->name,
            'value' => [
                "id" => $this->value->id,
                "sku" =>  $this->value->sku,
                "ean" =>  $this->value->ean,
                "price" =>  $this->value->price,
                "discount_price" =>  $this->value->discount_price,
                "sale_price" => $this->value->sale_price,
                "length" =>  $this->value->length,
                "height" =>  $this->value->height,
                "width" =>  $this->value->width,
                "weight" =>  $this->value->weight,
                "stock" => $this->value->stock,
                "featured_image" => $this->image,
            ],
        ];
        return $data;
    }
}
