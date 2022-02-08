<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SuraReciter
 *
 * @property int $id
 * @property int $reciter_id
 * @property \App\Models\Sura $sura
 * @property string $audio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $ayah
 * @property-read \App\Models\Reciter $reciter
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter query()
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereAudio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereAyah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereReciterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereSura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SuraReciter extends Model
{
    protected $guarded=[];

    protected $table = 'sura_reciters';

    public function reciter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Reciter::class);
    }

    public function sura(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Sura::class, 'sura', 'sura');
    }

    public static function add($request)
    {
        return self::create([
            'reciter_id' => $request->reciter_id,
            'sura' => $request->sura,
            'ayah' => $request->ayah,
            'audio' => 'audios/' . $request->reciter_id . '/' . $request->sura_id . '.mp3',
        ]);
    }
}
