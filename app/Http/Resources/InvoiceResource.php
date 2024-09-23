<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\ApiFunctions;

class InvoiceResource extends JsonResource
{
    use ApiFunctions;
    public function toArray($request)
    {
        return [
            'title'        => $this->title,
            'image'        => $this->image,
            'amount'        => $this->amount,
            'AddedBy'      => $this->admin->name.' - '.$this->admin->getRoleNames(),
            'created_at'    => $this->created_at,
 
        ];
    }
}
