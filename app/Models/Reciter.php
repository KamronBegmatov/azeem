<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Reciter
 *
 * @property int $id
 * @property string $name
 * @property string $info
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sura[] $suras
 * @property-read int|null $suras_count
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $style
 * @method static \Illuminate\Database\Eloquent\Builder|Reciter whereStyle($value)
 */
class Reciter extends Model
{
    protected $guarded=[];

    public function suras(){
        return $this->hasMany(Sura::class);
    }
}
