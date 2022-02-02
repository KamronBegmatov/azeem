<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuraReciterRequest;
use App\Http\Resources\Admin\SuraReciterResource;
use App\Models\SuraReciter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuraReciterController extends Controller
{

    public function index(Request $request)
    {
        $pages = $request->has('per_page') ? $request->per_page : 10;

        return SuraReciterResource::collection(SuraReciter::with(['reciter', 'sura'])->paginate($pages));
    }

    public function store(StoreSuraReciterRequest $request)
    {
        Storage::disk('public')->putFileAs('audios/' . $request->reciter_id . '/', $request->file('audio'), $request->sura_id . '.mp3');

        SuraReciter::add($request);

        return redirect()->route('sura_reciter.index')
            ->with('Success', 'Languages created successfully');
    }

    public function show(SuraReciter $sura_reciter)
    {
        return new SuraReciterResource($sura_reciter);
    }

    public function update(Request $request, SuraReciter $sura_reciter)
    {
        $request->validate([
            'reciter_id' => 'exists:reciters,id',
            'sura_id' => 'exists:suras,sura',
            'audio' => 'file',
        ]);

        if ($request->has('audio')) {
            Storage::disk('public')->putFileAs('audios/' . $request->reciter_id . '/', $request->file('audio'), $request->sura_id . '.mp3');
        }
        if ($request->has('reciter_id')) {
            $sura_reciter->reciter_id = $request->reciter_id;
        }
        if ($request->has('sura_id')) {
            $sura_reciter->sura_id = $request->sura_id;
        }

        $sura_reciter->save();

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
