<?php

namespace App\Http\Resources;

use App\Enums\StaticContentTypes;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\ContentTypes;
use SebastianBergmann\Type\StaticType;

class StaticContentItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return array_merge(parent::toArray($request),[
        //     'items' => StaticContentItemPartResource::collection($this->parts)
        // ]);


        $itemParts = [];
        foreach($this->parts as $itemPart){
            if($itemPart->type == StaticContentTypes::IMAGE or $itemPart->type == StaticContentTypes::IMAGE_CROPPER)
                $itemParts[$itemPart->name] = url($itemPart->value);
            else $itemParts[$itemPart->name] = $itemPart->value;
        }

        $data = [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "active" => $this->active,
            "structure" => $this->structure,
            'items' => $itemParts
        ];


        return $data;
    }
}
