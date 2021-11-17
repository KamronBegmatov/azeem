<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class OnlineTvController extends Controller
{

    public function index()
    {
        $online[] = [
            'Madina' => 'https://www.youtube.com/watch?v=1lic7TjwecQ',
            'Makkah' => 'https://www.youtube.com/watch?v=7jOEMgh3mz0',
        ];
        return $online;
    }
}
