<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuraReciterRequest;
use App\Models\Reciter;
use App\Models\Sura;
use App\Models\SuraReciter;

class SuraReciterController extends Controller
{
    public function index()
    {
        /*$sura_reciters = DB::table('sura_reciters')
            ->join('suras', 'sura_reciters.sura', '=', 'suras.sura')
            //->join('suras', 'sura_reciters.ayah', '=', 'suras.ayah')
            ->join('reciters', 'sura_reciters.reciter_id', '=', 'reciters.id')
            ->get();
        return $sura_reciters;*/
        return view('content.sura_reciters.index', ['sura_reciters' => SuraReciter::with('reciter')->get()]);
    }

    public function create()
    {
        return view('content.sura_reciters.create', ['suras' => Sura::distinct()->get(['sura']), 'reciters' => Reciter::all()]);
    }

    public function store(StoreSuraReciterRequest $request): \Illuminate\Http\RedirectResponse
    {
        SuraReciter::add($request);

        return redirect()->route('sura_reciters.index')
            ->with('Success', 'Sura_reciter created successfully');
    }

/*    don't need create/update because too much details, consider later
    public function edit(SuraReciter $sura_reciter)
    {
        return view('content.sura_reciters.edit', compact('sura_reciter'));
    }

    public function update(UpdateSuraReciterRequest $request, SuraReciter $sura_reciter): \Illuminate\Http\RedirectResponse
    {
        $sura_reciter->modify($request->validated());

        return redirect()->route('sura_reciters.index')
            ->with('Success', 'Sura-reciter updated successfully');
    }*/

    public function destroy(SuraReciter $sura_reciter): \Illuminate\Http\RedirectResponse
    {
        SuraReciter::deleteAudio($sura_reciter);

        $sura_reciter->delete();

        return redirect()->route('sura_reciters.index')
            ->with('Success', 'Sura-reciter deleted successfully');
    }
}
