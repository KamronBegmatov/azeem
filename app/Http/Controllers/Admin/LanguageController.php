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

        Language::create([
            'name' => $request->name,
            'active' => $request->active,
            'iso_code' => $request->iso_code,
            'language_code' => $request->language_code,
        ]);

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
            'active' => 'boolean',
            'iso_code' => 'unique',
        ]);

        if ($request->has('name')) {
            $language->name = $request->name;
        }

        if ($request->has('active')) {
            $language->active = $request->active;
        }

        if ($request->has('iso_code')) {
            $language->iso_code = $request->iso_code;
        }

        if ($request->has('language_code')) {
            $language->language_code = $request->language_code;
        }

        $language->save();

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
