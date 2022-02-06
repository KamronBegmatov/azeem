<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuraLang extends Model
{
    protected $primaryKey = 'sura';

    public function sura(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Sura::class, 'sura', 'sura');
    }

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
