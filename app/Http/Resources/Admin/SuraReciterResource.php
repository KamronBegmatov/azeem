<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class SuraReciterResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'reciter' => $this->reciter,
            'sura' => $this->sura,
            'ayah' => $this->ayah,
            'audio' => url('') . '/storage/' . $this->audio,
        ];
    }
}
