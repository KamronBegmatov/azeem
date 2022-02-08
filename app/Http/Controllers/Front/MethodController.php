<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class MethodController extends Controller
{
    public function index()
    {
        $prayer_times = Http::get('http://api.aladhan.com/v1/methods');

        return $prayer_times->json();
    }
}
