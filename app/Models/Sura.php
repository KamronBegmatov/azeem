<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sura
 *
 * @property int $id
 * @property int $sura
 * @property int $ayah
 * @property string $text
 * @property string|null $name
 * @property string|null $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sura newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sura newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sura query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sura whereAya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sura whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sura whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sura whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sura whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sura whereSura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sura whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sura whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\SuraLang|null $suraLang
 * @method static \Illuminate\Database\Eloquent\Builder|Sura whereAyah($value)
 */

class Sura extends Model
{
    protected $guarded=[];

    public function suraLang(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SuraLang::class, 'sura');
    }
}
