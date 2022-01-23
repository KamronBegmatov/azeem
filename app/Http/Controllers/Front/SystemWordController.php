<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\SystemWordResource;
use App\Models\SystemWord;
use Illuminate\Http\Request;

class SystemWordController extends Controller
{
    public function index(Request $request)
    {
        $system_words = SystemWord::where('iso_code', $request->iso_code);

        return SystemWordResource::collection($system_words->get());
    }

}
