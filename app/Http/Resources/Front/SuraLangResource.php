<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class SuraLangResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sura' => $this->sura,
            'aya' => $this->aya,
            'text' => $this->text,
            'lang' => $this->iso_code,
            'original' => new SuraResource($this->sura),
            'name' => $this->name,
            'location' => $this->location
        ];
    }
}
