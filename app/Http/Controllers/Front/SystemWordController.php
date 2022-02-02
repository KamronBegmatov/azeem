<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\SystemWordResource;
use App\Models\SystemWord;
use Illuminate\Http\Request;

class SystemWordController extends Controller
{
    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SystemWordResource::collection(
            SystemWord::where('language_id', $request->language_id)
                ->get());
    }
}
