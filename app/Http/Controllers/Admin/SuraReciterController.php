<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuraReciterRequest;
use App\Models\Reciter;
use App\Models\Sura;
use App\Models\SuraReciter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SuraReciterController extends Controller
{
    public function index()
    {
        $sura_reciters = DB::table('sura_reciters')
            ->join('suras', 'sura_reciters.sura', '=', 'suras.sura')
            ->join('reciters', 'sura_reciters.reciter_id', '=', 'reciters.id')
            ->get();

        return view('content.sura_reciters.index', ['sura_reciters' => $sura_reciters]);
    }

    public function create()
    {
        return view('content.sura_reciters.create', ['suras' => Sura::distinct()->get(['sura']), 'reciters' => Reciter::all()]);
    }

    public function store(StoreSuraReciterRequest $request): \Illuminate\Http\RedirectResponse
    {
        Storage::disk('public')->putFileAs('audios/' . $request->reciter_id . '/', $request->file('audio'), $request->sura_id . '.mp3');

        SuraReciter::add($request);

        return redirect()->route('sura_reciters.index')
            ->with('Success', 'Sura_reciter created successfully');
    }

    public function edit(SuraReciter $sura_reciter)
    {
        return view('content.sura_reciters.edit', compact('sura_reciter'));
    }

    public function update(Request $request, SuraReciter $sura_reciter): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'reciter_id' => 'exists:reciters,id',
            'sura' => 'exists:suras,sura',
            'ayah' => 'exists:suras,ayah',
            'audio' => 'file',
        ]);

        if ($request->has('audio')) {
            Storage::disk('public')->putFileAs('audios/' . $request->reciter_id . '/', $request->file('audio'), $request->sura_id . '.mp3');
        }
        if ($request->has('reciter_id')) {
            $sura_reciter->reciter_id = $request->reciter_id;
        }
        if ($request->has('sura')) {
            $sura_reciter->sura = $request->sura;
        }
        if ($request->has('ayah')) {
            $sura_reciter->ayah = $request->ayah;
        }

        $sura_reciter->save();

        return redirect()->route('sura_reciters.index')
            ->with('Success', 'Sura-reciter updated successfully');
    }

    public function destroy(SuraReciter $sura_reciter): \Illuminate\Http\RedirectResponse
    {
        Storage::disk('public')->delete('audios/' . $sura_reciter->reciter_id . '/' . $sura_reciter->sura_id . '.mp3');

        $sura_reciter->delete();

        return redirect()->route('sura_reciters.index')
            ->with('Success', 'Sura-reciter deleted successfully');
    }
}
