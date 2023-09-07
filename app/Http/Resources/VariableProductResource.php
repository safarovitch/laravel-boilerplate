<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VariableProductResource extends JsonResource
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

        $variations =  $this->variations()->whereHas('variation', function($qq){
            return $qq->whereHas('variation', function($qqq){
                return $qqq->groupBy('variation_id');
            });
        });

        $variationOptionsData = [];
        $variations->each(function($var) use (&$variationOptionsData){
            $variationOptionsData[] = [
                'id' => $var->variation->id,
                'variation_id' => $var->variation->variation_id,
                'label' => $var->variation->label,
                'value' => $var->variation->value,
                'type' => $var->variation->type
            ];
        });

        $variationData = [
            'variation' => array_merge(
                (new VariationResource($variations->first()->variation->variation))->toArray(request()),
                ['options' => $variationOptionsData]
            )
        ];

        $data = array_merge(parent::toArray($request),[
            'variations' => $variationData,
            'variants' => ProductVariationResource::collection($variants),
        ]);
        return $data;
    }
}
