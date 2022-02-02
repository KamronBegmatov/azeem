<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateQazoRequest;
use App\Models\Qazo;

class QazoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function show()
    {
        return Qazo::where('user_id', auth()->user()->id)->first();
    }

    public function update(UpdateQazoRequest $request)
    {
        return Qazo::updateOrCreate([
            'user_id' => auth()->user()->id,
        ],
            [
                'madhab' => $request->madhab,
                'gender' => $request->gender,
                'birth_date' => $request->birth_date,
                'adolescence_age' => $request->adolescence_age,
                'age_started_namaz' => $request->age_started_namaz,
                'number_of_children' => $request->number_of_children,
                'regular_nifos_days' => $request->regular_nifos_days,
                'regular_hayz_days' => $request->regular_hayz_days
            ]);
    }
}
