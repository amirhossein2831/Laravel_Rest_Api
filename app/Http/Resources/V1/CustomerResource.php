<?php

namespace App\Http\Resources\V1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'name'=>$this->name,
            'type' =>$this->type,
            'email'=>$this->email,
            'address'=> $this->address,
            'city'=> $this->city,
            'state' => $this->state,
            'postalCode'=> $this->postal_code,
            'invoices'=> InvoiceResource::collection($this->whenLoaded('invoices'))
        ];
    }
}
