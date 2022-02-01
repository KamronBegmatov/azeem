<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function index()
    {
        return view('content.styles.index', ['styles' => Style::all()]);
    }

    public function create()
    {
        return view('content.styles.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'language_id' => 'required|exists:languages,id',
        ]);

        Style::add($request);

        return redirect()->route('styles.index')
            ->with('Success','Style created successfully');
    }

    public function edit(Style $style)
    {
        return view('content.styles.edit', compact('style'));
    }

    public function update(Request $request, Style $style): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'string',
            'language_id' => 'exists:languages,id',
        ]);

        $style->update($request->all());

        return redirect()->route('styles.index')
            ->with('Success','Style updated successfully');
    }

    public function destroy(Style $style): \Illuminate\Http\RedirectResponse
    {
        $style->delete();

        return redirect()->route('styles.index')
            ->with('Success', 'Style deleted successfully');
    }
}
