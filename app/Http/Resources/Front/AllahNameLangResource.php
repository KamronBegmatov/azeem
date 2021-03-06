<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class AllahNameLangResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'allah_name' => $this->allah_name,
            'name' => $this->name,
            'language' => $this->language,
        ];
    }
}
