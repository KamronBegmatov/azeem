<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class SuraResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sura' => $this->sura,
            'aya' => $this->aya,
            'text' => $this->text,
            'name' => $this->name,
            'location' => $this->location
        ];
    }
}
