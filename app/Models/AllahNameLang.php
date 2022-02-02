<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllahNameLang extends Model
{
    protected $guarded = [];

    public function allahName(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AllahName::class, 'allah_name_id');
    }

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
