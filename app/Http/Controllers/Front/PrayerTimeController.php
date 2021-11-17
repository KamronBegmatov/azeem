<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrayerTimeController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('mode')) {
            $method = $request->mode;
        } else {
            $method = '2';
        }
        $prayer_times = Http::get('http://api.aladhan.com/v1/calendarByCity', [
            'city' => $request->city,
            'country' => $request->country,
            'month' => $request->month,
            'year' => $request->year,
            'method' => $method,
        ]);
        return $prayer_times->json();
    }

    public function show(Request $request)
    {
        if ($request->has('mode')) {
            $method = $request->mode;
        } else {
            $method = '2';
        }
        $prayer_times = Http::get('http://api.aladhan.com/v1/timingsByCity', [
            'date_or_timestamp' => $request->date_or_timestamp,
            'city' => $request->city,
            'country' => $request->country,
            'method' => $method,
        ]);
        return $prayer_times->json();
    }

}
