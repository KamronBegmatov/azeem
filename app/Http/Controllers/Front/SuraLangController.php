<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SuraReciter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuraLangController extends Controller
{
    public function index(Request $request): array
    {
        $request->validate([
            'language_id' => 'exists:sura_langs,language_id',
            'reciter_id' => 'exists:sura_reciters,reciter_id',
        ]);

        return DB::select(
            'select
                        sura_langs.sura, sura_langs.name,
                        sura_langs.location, COUNT(suras.ayah) as ayahs,
                        languages.name as language,
                        CONCAT(?,"/storage/",sura_reciters.audio) as audio
                        from sura_langs
                        join languages on sura_langs.language_id = languages.id
                         join sura_reciters on sura_langs.sura = sura_reciters.sura
                          join suras on sura_langs.sura = suras.sura and sura_langs.ayah = suras.ayah
                          where sura_reciters.reciter_id = ? and sura_langs.language_id = ?
                           group by sura_langs.sura, sura_langs.language_id, sura_langs.name, sura_langs.location, sura_reciters.audio',
            [config('app.url'), $request->reciter_id, $request->language_id]);
    }

    public function show(Request $request, $sura): array
    {
        $request->validate([
            'sura' => 'exists:sura_langs,sura',
            'language_id' => 'exists:sura_langs,language_id',
            'reciter_id' => 'exists:sura_reciters,reciter_id',
        ]);

        if (SuraReciter::where('reciter_id', $request->reciter_id)->where('sura', $sura)->first()->ayah) {
            return DB::select(
                'select
                        sura_langs.ayah,
                        sura_langs.text,
                        sura_langs.name,
                        suras.text as original,
                        CONCAT(?,"/storage/",sura_reciters.audio) as audio
                         from sura_langs
                          join sura_reciters on sura_langs.sura = sura_reciters.sura and sura_langs.ayah = sura_reciters.ayah
                            join suras on sura_langs.sura = suras.sura and sura_langs.ayah = suras.ayah
                            where sura_reciters.reciter_id = ? and sura_langs.language_id = ? and sura_langs.sura = ?
            group by sura_langs.ayah, sura_langs.text, sura_langs.name, suras.text, sura_reciters.audio',
                [config('app.url'), $request->reciter_id, $request->language_id, $sura]);
        } else
            return DB::select(
                'select
                        sura_langs.ayah,
                        sura_langs.text,
                        sura_langs.name,
                        suras.text as original,
                        CONCAT(?,"/storage/",sura_reciters.audio) as audio
                         from sura_langs
                          join sura_reciters on sura_langs.sura = sura_reciters.sura
                            join suras on sura_langs.sura = suras.sura and sura_langs.ayah = suras.ayah
                            where sura_reciters.reciter_id = ? and sura_langs.language_id = ? and sura_langs.sura = ?
            group by sura_langs.ayah, sura_langs.text, sura_langs.name, suras.text, sura_reciters.audio',
                [config('app.url'), $request->reciter_id, $request->language_id, $sura]);
    }

}
