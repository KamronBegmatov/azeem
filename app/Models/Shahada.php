<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shahada
 *
 * @property int $id
 * @property string $text
 * @property string $iso_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Language $lang
 * @method static \Illuminate\Database\Eloquent\Builder|Shahada newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shahada newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shahada query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shahada whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shahada whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shahada whereIsoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shahada whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shahada whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Shahada extends Model
{
    protected $guarded=[];

    public function lang(){
        return $this->belongsTo(Language::class, 'iso_code', 'iso_code');
    }
}
