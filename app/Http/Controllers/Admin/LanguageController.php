<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        return view('content.languages.index', ['languages' => Language::all()]);
    }

    public function create()
    {
        return view('content.languages.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'active' => 'boolean',
            'iso_code' => 'required|unique:languages,iso_code',
        ]);

        Language::add($request);

        return redirect()->route('languages.index')
            ->with('Success', 'Language created successfully');
    }

    public function edit(Language $language)
    {
        return view('content.languages.edit', compact('language'));
    }

    public function update(UpdateLanguageRequest $request, Language $language): \Illuminate\Http\RedirectResponse
    {
        $language->update($request->validated());

        return redirect()->route('languages.index')
            ->with('Success', 'Language updated successfully');
    }

    public function destroy(Language $language): \Illuminate\Http\RedirectResponse
    {
        $language->delete();

        return redirect()->route('languages.index')
            ->with('Success', 'Language deleted successfully');
    }
}
