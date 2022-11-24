<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
              "id"=> $this->id,
                   "img_main"=> $this->img_main,
                   "name"=> $this->translate()?->name,
                   "category"=> $this->category()->withTrashed()->first(),
                   "category_id"=> $this->category_id,
                  "sku"=> $this->sku,
                  "price"=> $this->price,
//                  "price"=> number_format($this->price/100,2 , '.', ','),
//                   "orders"=> "48",
                  "rating"=> "4.2",
//            "title_seo"=> $this->title_seo,
//            "description"=> $this->description,
//            "description_seo"=> $this->description_seo,
//            "keywords"=> $this->keywords,
            "discount_enable"=> $this->discount_enable,
            "plant_type"=> $this->plant_type,
            "deleted_at"=> $this->deleted_at,
            "is_published"=> $this->is_published,
            "discount"=> $this->discount,
            "images"=> $this->images,
            "tags"=> $this->tags,
            "effects"=> $this->effects,
            "cbd"=> $this->cbd,
            "thc"=> $this->thc,
            "size"=> $this->size,
            "translations"=> $this->getTranslationsArray(),
        ];
    }
}
