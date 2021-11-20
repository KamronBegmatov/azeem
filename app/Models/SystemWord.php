<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SystemWord
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $iso_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Language $iso_cod
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord query()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereIsoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemWord whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SystemWord extends Model
{
    protected $guarded=[];

    public function iso_cod(){
        return $this->belongsTo(Language::class, 'iso_code', 'iso_code');
    }
}
