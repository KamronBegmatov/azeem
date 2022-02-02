<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\AllahNameLangResource;
use App\Models\AllahNameLang;
use Illuminate\Http\Request;

class AllahNameLangController extends Controller
{
    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return AllahNameLangResource::collection(AllahNameLang::where('language_id', $request->language_id)->with(['allah_name', 'language'])->get());
    }

    public function show(AllahNameLang $allah_name_lang): AllahNameLangResource
    {
        return new AllahNameLangResource($allah_name_lang);
    }
}
