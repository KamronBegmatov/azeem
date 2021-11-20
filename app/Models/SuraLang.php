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
 * @property int $id
 * @property \App\Models\Sura $sura
 * @property int $aya
 * @property string $text
 * @property string|null $iso_code
 * @property string|null $name
 * @property string|null $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereAya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereIsoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereSura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraLang whereUpdatedAt($value)
 */
class SuraLang extends Model
{
    protected $primaryKey = 'sura';

    public function sura(){
        return $this->belongsTo(Sura::class, 'sura', 'sura');
    }

}
