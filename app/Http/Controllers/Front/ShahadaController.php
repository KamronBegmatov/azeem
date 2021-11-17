<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Shahada;
use Illuminate\Http\Request;

class ShahadaController extends Controller
{
    public function index(Request $request){
        return Shahada::where('iso_code', $request->lang)->get();
    }
}
