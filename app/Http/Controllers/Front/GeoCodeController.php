<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeoCodeController extends Controller
{
    public function getGeoCode(Request $request): \Illuminate\Http\Client\Response
    {
        return Http::get('https://geocode-maps.yandex.ru/1.x', [
            'geocode' => $request->geocode,
            'apikey' => config('from_env.yandex_api_key'),
            'format' => 'json',
        ]);
    }
}
