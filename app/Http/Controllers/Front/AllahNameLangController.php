<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\AllahNameLangResource;
use App\Models\AllahNameLang;
use Illuminate\Http\Request;

class AllahNameLangController extends Controller
{

    public function index(Request $request)
    {
        $allahNameLangs = AllahNameLang::where('iso_code', $request->lang)->with('allah_name');
        return AllahNameLangResource::collection($allahNameLangs->get());
    }

    public function show(AllahNameLang $allahNameLang)
    {
        return new AllahNameLangResource($allahNameLang);
    }
}
