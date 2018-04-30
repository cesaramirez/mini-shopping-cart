<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductColorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'image'       => $this->image,
            'price'       => $this->price,
            'hexa_code'   => $this->hexa_code,
            'stock'       => $this->stock,
            'parent'     => $this->product,
        ];
    }
}
