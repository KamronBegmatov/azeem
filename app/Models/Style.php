<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $guarded=[];

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public static function add($request)
    {
        return self::create([
            'name' => $request->name,
            'language_id' => $request->language_id,
        ]);
    }
}
