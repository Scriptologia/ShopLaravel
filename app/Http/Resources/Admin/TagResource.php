<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->translate()?->name,
            'slug' => $this->slug,
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at,
            "translations"=> $this->getTranslationsArray(),
        ];
    }
}
