<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeoCodeController extends Controller
{
    public function getGeoCode(Request $request): \Illuminate\Http\Client\Response
    {
        return Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'latlng' => $request->latlng,
            'sensor' => true,
            'key' => config('from_env.google_api_key'),
        ]);
    }
}
