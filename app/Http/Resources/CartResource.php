<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CartResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'transaction_date' => $this->date,
            'transaction_id' => $this->id,
            'id' => $this->property->id,
            'type_of_sales' => $this->property->category->name,
            'bulding_type' => $this->property->building->name,
            'price' => $this->property->price,
            'location' => $this->property->address,
            'image_path' => $this->property->image
        ];
    }
}
