<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemWord extends Model
{
    protected $guarded=[];

    public function iso_cod(){
        return $this->belongsTo(Language::class, 'iso_code', 'iso_code');
    }
}
