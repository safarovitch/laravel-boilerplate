<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // dd($this->name);
        $data = [
            "name" => $this->name,
            "file_name" => $this->file_name,
            "uuid" => $this->uuid,
            "preview_url" => $this->preview_url,
            "original_url" => $this->original_url,
            "order" => $this->order,
            "custom_properties" => $this->custom_properties,
            "extension" => $this->extension,
            "size" => $this->size
        ];

        return $data;
    }
}
