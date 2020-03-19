<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cart extends JsonResource
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
            'status' => $this->status,
            'session_id' => $this->session_id,
            'items' => $this->details->each( function( $item ) {
                return [
                    'id' => $item->id,
                    'cart_id' => $item->cart_id,
                    'product_id' => $item->product_id,
                    'discount' => $item->discount,
                    'product' => $item->product,
                    'quantity' => $item->quantity,
                ];
            }),
        ];
    }
}
