<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SuraReciterResource;
use App\Models\SuraReciter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuraReciterController extends Controller
{

    public function index(Request $request)
    {
        $sura_reciters = SuraReciter::with(['reciter', 'sura']);
        $pages = 10;
        if ($request->has('per_page')) {
            $pages = $request->per_page;
        }
        return SuraReciterResource::collection($sura_reciters->paginate($pages));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reciter_id' => 'required|exists:reciters,id',
            'sura_id' => 'required|exists:suras,sura',
            'audio' => 'required|file',
        ]);
        Storage::disk('public')->putFileAs('audios/' . $request->reciter_id . '/', $request->file('audio'), $request->sura_id . '.mp3');
        $sura_reciter = SuraReciter::create([
            'reciter_id' => $request->reciter_id,
            'sura_id' => $request->sura_id,
            'audio' => 'audios/' . $request->reciter_id . '/' . $request->sura_id . '.mp3',
        ]);
        return new SuraReciterResource($sura_reciter);
    }

    public function show(SuraReciter $sura_reciter)
    {
        return new SuraReciterResource($sura_reciter);
    }

    public function update(Request $request, SuraReciter $sura_reciter)
    {
        if ($request->has('audio')) {
            Storage::disk('public')->putFileAs('audios/' . $request->reciter_id . '/', $request->file('audio'), $request->sura_id . '.mp3');
        }
        $sura_reciter->update([
            'reciter_id' => $request->reciter_id,
            'sura_id' => $request->sura_id,
        ]);
        return new SuraReciterResource($sura_reciter);
    }

    public function destroy(SuraReciter $sura_reciter)
    {
        try {
            $sura_reciter->delete();
        } catch (\Exception $e) {
            return response()->json([
                'code' => Controller::CODE_DB_TRANSACTION,
                'message' => $e->getMessage(),
            ], 400);
        }
        return $sura_reciter->id;
    }
}
