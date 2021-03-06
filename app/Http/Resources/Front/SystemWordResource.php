<?php

namespace App\Http\Resources\Front;

use App\Http\Resources\Admin\LanguageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SystemWordResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'language' => new LanguageResource($this->language)
        ];
    }
}
