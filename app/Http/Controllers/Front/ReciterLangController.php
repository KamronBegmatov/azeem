<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\ReciterLangResource;
use App\Models\ReciterLang;
use Illuminate\Http\Request;

class ReciterLangController extends Controller
{
    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ReciterLangResource::collection(ReciterLang::where('language_id', $request->language_id)->get());
    }

    public function show(ReciterLang $reciter_lang): ReciterLangResource
    {
        return new ReciterLangResource($reciter_lang);
    }
}
