<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReciterLangRequest;
use App\Http\Requests\UpdateReciterLangRequest;
use App\Models\Language;
use App\Models\Reciter;
use App\Models\ReciterLang;
use App\Models\Style;

class ReciterLangController extends Controller
{
    const ARR = ['reciter', 'style', 'language'];

    public function index()
    {
        return view('content.reciter_langs.index', ['reciter_langs' => ReciterLang::with(self::ARR)->paginate(20)]);
    }

    public function create()
    {
        return view('content.reciter_langs.create', ['reciters' => Reciter::all(), 'styles' => Style::all(), 'languages' => Language::all()]);
    }

    public function store(StoreReciterLangRequest $request): \Illuminate\Http\RedirectResponse
    {
        ReciterLang::add($request);

        return redirect()->route('reciter_langs.index')
            ->with('Success', 'Reciter lang created successfully');
    }

    public function edit(ReciterLang $reciter_lang)
    {
        return view('content.reciter_langs.edit', ['reciter_lang' => $reciter_lang, 'reciters' => Reciter::all(), 'styles' => Style::all(), 'languages' => Language::all()]);
    }

    public function update(UpdateReciterLangRequest $request, ReciterLang $reciter_lang): \Illuminate\Http\RedirectResponse
    {
        $reciter_lang->update($request->validated());

        return redirect()->route('reciter_langs.index')
            ->with('Success', 'Reciter lang updated successfully');
    }

    public function destroy(ReciterLang $reciter_lang): \Illuminate\Http\RedirectResponse
    {
        $reciter_lang->delete();

        return redirect()->route('reciter_langs.index')
            ->with('Success', 'Reciter lang deleted successfully');
    }
}
