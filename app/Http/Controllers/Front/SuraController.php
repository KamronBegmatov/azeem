<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\SuraResource;
use App\Models\Sura;
use Illuminate\Http\Request;

class SuraController extends Controller
{

    public function index(Request $request)
    {
/*        $suras = Sura::with('suraLang')->where('sura_lang.iso_code', $request->lang);
        $pages = 10;
        if ($request->has('per_page')) {
            $pages = $request->per_page;
        }
        return SuraResource::collection($suras->paginate($pages));*/
    }

    public function show(Sura $sura)
    {
        return new SuraResource($sura);
    }

}
