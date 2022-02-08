<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AllahName;
use App\Models\AllahNameLang;
use App\Models\Language;
use Illuminate\Http\Request;

class AllahNameLangController extends Controller
{
    public function index()
    {
        return view('content.allah_name_langs.index', ['allah_name_langs' => AllahNameLang::with(['allahName', 'language'])->get()]);
    }

    public function create()
    {
        return view('content.allah_name_langs.create', ['allah_names' => AllahName::all(), 'languages' => Language::all()]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'allah_name_id' => 'required|exists:allah_names,id',
            'name' => 'required',
            'language_id' => 'required|exists:languages,id',
        ]);

        AllahNameLang::create([
            'allah_name_id' => $request->allah_name_id,
            'name' => $request->name,
            'language_id' => $request->language_id,
        ]);

        return redirect()->route('allah_name_langs.index')
            ->with('Success', 'Allah name translated created successfully');
    }

    public function edit(AllahNameLang $allah_name_lang)
    {
        return view('content.allah_name_langs.edit', ['allah_name_lang' => $allah_name_lang, 'allah_names' => AllahName::all(), 'languages' => Language::all()]);
    }

    public function update(Request $request, AllahNameLang $allah_name_lang)
    {
        $request->validate([
            'allah_name_id' => 'exists:allah_names,id',
            'language_id' => 'exists:languages,id',
            'name' => 'string'
        ]);

        $allah_name_lang->update($request->all());

        return redirect()->route('allah_name_langs.index')
            ->with('Success', 'Allah name translated updated successfully');
    }

    public function destroy(AllahNameLang $allah_name_lang): \Illuminate\Http\RedirectResponse
    {
        $allah_name_lang->delete();

        return redirect()->route('allah_name_langs.index')
            ->with('Success', 'Allah name lang deleted successfully');
    }
}
