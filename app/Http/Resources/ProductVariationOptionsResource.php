<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariationOptionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $variations =  $this->variation()->whereHas('variation', function($q){
            return $q->groupBy('variation_id');
        });

        $data = [
            'variation' => [
                new VariationResource($variations->first()->variation)
            ],
            'options' => $variations->get()
        ];

        return $data;
    }
}
