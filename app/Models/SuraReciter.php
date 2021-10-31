<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SuraReciter
 *
 * @property-read \App\Models\Reciter $reciter
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sura[] $suras
 * @property-read int|null $suras_count
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter query()
 * @mixin \Eloquent
 */
class SuraReciter extends Model
{
    protected $guarded=[];

    protected $table = 'sura_reciters';

    public function reciter(){
        return $this->belongsTo(Reciter::class);
    }

    public function sura(){
        return $this->belongsTo(Sura::class, 'sura_id', 'sura');
    }
}
