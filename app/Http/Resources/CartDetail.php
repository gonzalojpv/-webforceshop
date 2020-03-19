<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cart_id' => $this->cart_id,
            'session_id' => $this->cart->session_id,
            'product_id' => $this->product_id,
            'discount' => $this->discount,
            'product' => $this->product,
            'quantity' => $this->quantity,
        ];
    }
}
