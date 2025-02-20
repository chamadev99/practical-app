<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //dd($request);
        return [
            'id' => $this->id,
            'pickup_address' => $this->pickup_address,
            'pickup_name' => $this->pickup_name,
            'pickup_contact_no' => $this->pickup_contact_no,
            'pickup_email' => $this->pickup_email,
            'delivery_address' => $this->delivery_address,
            'delivery_name' => $this->delivery_name,
            'delivery_contact_no' => $this->delivery_contact_no,
            'delivery_email' => $this->delivery_email,
            'type_of_goods' => $this->type_of_goods,
            'deliver_provider' => $this->deliver_provider,
            'priority' => $this->priority,
            'shipment_pickup_date' => $this->shipment_pickup_date, // Formats as 'YYYY-MM-DD'
            'shipment_pickup_time' => $this->shipment_pickup_time, // Formats as 'HH:MM:SS'
            'description' => $this->description,
            'dimensions' => [
                'length' => $this->length,
                'height' => $this->height,
                'width' => $this->width,
            ],
            'weight' => $this->weight,
            'status' => $this->status,
            'created_at' => $this->created_at, // Formats as 'YYYY-MM-DD HH:MM:SS'
        ];
        //return parent::toArray($request);
    }
}
