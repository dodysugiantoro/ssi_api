<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $code = $this->id;

        switch (strlen($code)) {
        case '1':
            $code = '000'. $this->id;
        break;
        case '2':
            $code = '00'. $this->id;
        break;
        case '3':
            $code = '0'. $this->id;
        break;
        default:
            $code = $this->id;
        } 

        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'code' => 'SSI/'. $this->created_at->format('dmY') .'/'. $code,
            'name' => $this->name,
            'detail' => $this->detail,
            'created_at' => $this->created_at->format('d/m/Y'),
            // 'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
