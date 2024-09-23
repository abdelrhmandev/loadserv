<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\ApiFunctions;

class InvoiceResource extends JsonResource
{
    use ApiFunctions;
    public function toArray($request)
    {

        $this->image && File::exists(public_path($this->image)) ? ($imagePath = url(asset($this->image))) : ($imagePath = asset('assets/backend/media/svg/files/blank-image.svg'));

        return [
            'title'        => $this->title,
            'image'        => $imagePath,
            'amount'        => $this->amount,
            'AddedBy'      => $this->admin->name.' - '.$this->admin->getRoleNames(),
            'created_at'    => $this->created_at,
 
        ];
    }
}
