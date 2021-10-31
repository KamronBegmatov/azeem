<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SuraLang
 *
 * @property-read \App\Models\Sura $suras
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang query()
 * @mixin \Eloquent
 */
class SuraLang extends Model
{
    protected $primaryKey = 'sura';

    public function sura(){
        return $this->belongsTo(Sura::class, 'sura', 'sura');
    }

}
