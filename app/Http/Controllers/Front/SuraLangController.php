<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuraLangController extends Controller
{
    public function index(Request $request)
    {
        return DB::select(
            'select
                        sura_langs.sura, sura_langs.iso_code as lang, sura_langs.name,
                        sura_langs.location, COUNT(suras.aya) as ayahs,
                        CONCAT(?,"/storage/",sura_reciters.audio) as audio
                        from sura_langs
                         join sura_reciters on sura_langs.sura = sura_reciters.sura_id
                          join suras on sura_langs.sura = suras.sura and sura_langs.aya = suras.aya where sura_langs.iso_code = ? and sura_reciters.reciter_id = ?
                           group by sura_langs.sura, sura_langs.iso_code, sura_langs.name, sura_langs.location, sura_reciters.audio',
            [config('app.url'), $request->lang, $request->reciter_id]);
    }

    public function show(Request $request, $sura)
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
                            join suras on sura_langs.sura = suras.sura and sura_langs.aya = suras.aya where sura_langs.sura = ? and sura_langs.iso_code = ?',
            [config('app.url'), $sura, $request->lang, $request->reciter_id]);
    }

}
