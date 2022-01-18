<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrayerTimeByCityController extends Controller
{
    public $method;
    public $school;

    public function __construct(Request $request)
    {
        $this->method = $request->has('mode') ? $request->mode : '2';
        $this->school = $request->has('school') ? $request->school : 0;
    }

    public function index(Request $request)
    {
        $annual = $request->has('annual') ? $request->annual : 0;

        $prayer_times = Http::get('http://api.aladhan.com/v1/calendarByCity', [
            'city' => $request->city,
            'country' => $request->country,
            'month' => $request->month,
            'year' => $request->year,
            'method' => $this->method,
            'school' => $this->school,
            'annual' => $annual,
        ]);

        return $prayer_times->json();
    }

    public function show(Request $request)
    {
        $prayer_times = Http::get('http://api.aladhan.com/v1/timingsByCity', [
            'date_or_timestamp' => $request->date_or_timestamp,
            'city' => $request->city,
            'country' => $request->country,
            'method' => $this->method,
            'school' => $this->school,
        ]);

        return $prayer_times->json();
    }
}
