<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user' => ['id' => $this->user?->id, 'name' => $this->user?->name],
            'amount' => $this->amount,
            'payment_status' => $this->payment_status,
            'delivery_status' => $this->delivery_status,
            'payment_method' => $this->payment_method,
            'country' => $this->country,
            'products' => $this->products()->withTrashed()->withTranslation()->get()->map(function ($item) {
                return collect($item->toArray())->only(['id', 'name']);
            }),
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
