<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\LanguageResource;
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'active' => 'boolean',
            'iso_code' => 'required|unique:languages,iso_code',
        ]);

        Language::add($request);

        return redirect()->route('languages.index')
            ->with('Success','Languages created successfully');
    }

    public function show(Language $language)
    {
        return new LanguageResource($language);
    }

    public function edit(Language $language)
    {
        return view('content.languages.edit',compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'string',
            'active' => 'boolean',
            'iso_code' => 'unique',
            'language_code' => 'string'
        ]);

        $language->update($request->all());

        return redirect()->route('languages.index')
            ->with('Success','Language updated successfully');
    }

    public function destroy(Language $language)
    {
        try {
            $language->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return  redirect()->route('languages.index')
            ->with('Success','Language deleted successfully');
    }
}
