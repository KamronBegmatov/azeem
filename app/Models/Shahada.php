<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shahada extends Model
{
    protected $guarded=[];

    public function lang(){
        return $this->belongsTo(Language::class, 'iso_code', 'iso_code');
    }
}
