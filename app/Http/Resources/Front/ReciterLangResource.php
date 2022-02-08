<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class ReciterLangResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'info' => $this->info,
            'reciter' => [
                'title' => $this->reciter->title,
                'image' => url('') . '/storage/' . $this->reciter->image
            ],
            'style' => $this->style,
            'language' => $this->language,
        ];
    }
}
