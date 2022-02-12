<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    protected $guarded = [];

    protected $table = 'sura_reciters';

    public function reciter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Reciter::class);
    }

    public function sura(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Sura::class, 'sura', 'sura');
    }

    public static function addWithAyah($request)
    {
        //check if this sura has such an ayah
        Sura::checkIfExists($request->sura, $request->ayah);

        //saving audio of sura of reciter
        Storage::disk('public')->putFileAs('audios/' . $request->reciter_id . '/', $request->file('audio'), $request->sura . '-' . $request->ayah . '.mp3');

        return self::create([
            'reciter_id' => $request->reciter_id,
            'sura' => $request->sura,
            'ayah' => $request->ayah,
            'audio' => 'audios/' . $request->reciter_id . '/' . $request->sura . '-' . $request->ayah . '.mp3',
        ]);
    }

    public static function addWithoutAyah($request)
    {
        //saving audio of sura of reciter
        Storage::disk('public')->putFileAs('audios/' . $request->reciter_id . '/', $request->file('audio'), $request->sura . '.mp3');

        return self::create([
            'reciter_id' => $request->reciter_id,
            'sura' => $request->sura,
            'ayah' => $request->ayah,
            'audio' => 'audios/' . $request->reciter_id . '/' . $request->sura . '.mp3',
        ]);
    }

    public static function checkIfAyahInRequest($request)
    {
        if ($request->filled('ayah')) return true;
    }

    public static function add($request)
    {
        if(SuraReciter::checkIfAyahInRequest($request)){
            return self::addWithAyah($request);
        }else{
            return self::addWithoutAyah($request);
        }
    }

    public static function deleteAudio($sura_reciter)
    {
        if($sura_reciter->ayah){
            Storage::disk('public')->delete('audios/' . $sura_reciter->reciter_id . '/' . $sura_reciter->sura . '-' . $sura_reciter->ayah . '.mp3');
        }else {
            Storage::disk('public')->delete('audios/' . $sura_reciter->reciter_id . '/' . $sura_reciter->sura . '.mp3');
        }
    }

/*    public function modify($request)
    {
        if (SuraReciter::checkIfAyahInRequest($request)) {
            //check if this sura has such an ayah
            Sura::checkIfExists($request->sura, $request->ayah);

            if ($request->has('audio')) {
                Storage::disk('public')->putFileAs('audios/' . $request->reciter_id . '/', $request->file('audio'), $request->sura . '-' . $request->ayah . '.mp3');
            }
            if ($request->has('reciter_id')) {
                $this->reciter_id = $request->reciter_id;
            }
            if ($request->has('sura')) {
                $this->sura = $request->sura;
            }
            if ($request->has('ayah')) {
                $this->ayah = $request->ayah;
            }

            $this->save();
        }else{
            if ($request->has('audio')) {
                Storage::disk('public')->putFileAs('audios/' . $request->reciter_id . '/', $request->file('audio'), $request->sura . '.mp3');
            }
            if ($request->has('reciter_id')) {
                $this->reciter_id = $request->reciter_id;
            }
            if ($request->has('sura')) {
                $this->sura = $request->sura;
            }
            if ($request->has('ayah')) {
                $this->ayah = $request->ayah;
            }

            $this->save();
        }
    }*/
}
