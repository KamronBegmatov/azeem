<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllahNameLang extends Model
{
    protected $guarded=[];

    public function allah_name(){
        return $this->belongsTo(AllahName::class, 'allah_name_id');
    }
}
