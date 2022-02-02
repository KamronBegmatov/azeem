<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qazo extends Model
{
    protected $guarded=[];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
