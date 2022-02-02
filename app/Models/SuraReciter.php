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
 * @property int $id
 * @property int $reciter_id
 * @property int $sura_id
 * @property string $audio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Sura $sura
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereAudio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereReciterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereSuraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuraReciter whereUpdatedAt($value)
 */
class SuraReciter extends Model
{
    protected $guarded=[];

    protected $table = 'sura_reciters';

    public function reciter()
    {
        return $this->belongsTo(Reciter::class);
    }

    public function sura()
    {
        return $this->belongsTo(Sura::class, 'sura_id', 'sura');
    }

    public static function add($request)
    {
        return self::create([
            'reciter_id' => $request->reciter_id,
            'sura_id' => $request->sura_id,
            'audio' => 'audios/' . $request->reciter_id . '/' . $request->sura_id . '.mp3',
        ]);
    }
}
