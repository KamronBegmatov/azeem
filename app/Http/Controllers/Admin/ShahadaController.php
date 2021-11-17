<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shahada;
use Illuminate\Http\Request;

class ShahadaController extends Controller
{
    public function index()
    {
        return Shahada::with('iso_cod')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'iso_code' => 'required|exists:languages,iso_code',
        ]);
        $shahada = Shahada::create([
            'text' => $request->text,
            'iso_code' => $request->iso_code,
        ]);
        return $shahada;
    }

    public function show(Shahada $shahada)
    {
        return $shahada;
    }

    public function update(Request $request, Shahada $shahada)
    {
        $request->validate([
            'iso_code' => 'exists:languages,iso_code',
        ]);
        if ($request->has('text')) {
            $shahada->text = $request->text;
        }
        if ($request->has('iso_code')) {
            $shahada->iso_code = $request->iso_code;
        }
        $shahada->save();
        return $shahada;

    }

    public function destroy(Shahada $shahada)
    {
        try {
            $shahada->delete();
        } catch (\Exception $e) {
            return response()->json([
                'code' => Controller::CODE_DB_TRANSACTION,
                'message' => $e->getMessage(),
            ], 400);
        }
        return $shahada->id;
    }
}
