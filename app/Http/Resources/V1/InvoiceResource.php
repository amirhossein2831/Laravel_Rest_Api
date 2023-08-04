<?php

namespace App\Http\Resources\V1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class InvoiceResource extends JsonResource
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
            'id'=>$this->id,
            'customerId'=> $this->customer_id,
            'amount'=>$this->amount,
            'status'=>$this->status,
            'billedDate'=>$this->billed_date,
            'paidDate'=>$this->paid_date,
        ];
    }
}
