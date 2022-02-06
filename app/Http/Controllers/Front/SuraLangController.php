<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuraLangController extends Controller
{
    public function index(Request $request): array
    {
        return DB::select(
            'select
                        sura_langs.sura, sura_langs.name,
                        sura_langs.location, COUNT(suras.aya) as ayahs,
                        languages.name as language,
                        CONCAT(?,"/storage/",sura_reciters.audio) as audio
                        from sura_langs
                        join languages on sura_langs.language_id = languages.id
                         join sura_reciters on sura_langs.sura = sura_reciters.sura_id
                          join suras on sura_langs.sura = suras.sura and sura_langs.aya = suras.aya where sura_langs.language_id = ? and sura_reciters.reciter_id = ?
                           group by sura_langs.sura, sura_langs.language_id, sura_langs.name, sura_langs.location, sura_reciters.audio',
            [config('app.url'), $request->language_id, $request->reciter_id]);
    }

    public function show(Request $request, $sura): array
    {
        return DB::select(
            'select
                        sura_langs.id,
                        sura_langs.aya,
                        sura_langs.text,
                        sura_langs.name,
                        suras.text as original,
                        CONCAT(?,"/storage/",sura_reciters.audio) as audio
                         from sura_langs
                          join sura_reciters on sura_langs.sura = sura_reciters.sura_id
                            join suras on sura_langs.sura = suras.sura and sura_langs.aya = suras.aya where sura_langs.sura = ? and sura_langs.language_id = ?',
            [config('app.url'), $sura, $request->language_id, $request->reciter_id]);
    }

}
