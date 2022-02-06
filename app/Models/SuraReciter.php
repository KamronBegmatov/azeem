<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
