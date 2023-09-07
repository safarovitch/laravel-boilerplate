<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = array_merge( parent::toArray($request), [
            'categories' => $this->categories,
            'featured_image' => $this->featured_image,
            'author' => new UserResource($this->author)
        ]);
        return $data;
    }
}
