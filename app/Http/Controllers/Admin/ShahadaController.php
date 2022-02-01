<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shahada;
use Illuminate\Http\Request;

class ShahadaController extends Controller
{
    public function index()
    {
        return view('content.shahadas.index', ['shahadas' => Shahada::with('language')->get()]);
    }

    public function create()
    {
        return view('content.shahadas.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'text' => 'required|min:3|max:1000',
            'language_id' => 'required|exists:languages,id',
        ]);

        Shahada::add($request->validated());

        return redirect()->route('shahadas.index')
            ->with('Success', 'Shahada created successfully');
    }

    public function edit(Shahada $shahada)
    {
        return view('content.shahadas.edit', compact('shahada'));
    }

    public function update(Request $request, Shahada $shahada): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'language_id' => 'exists:languages,id',
            'text' => 'min:3|max:1000'
        ]);

        $shahada->update($validated);

        return redirect()->route('shahadas.index')
            ->with('Success', 'Shahada updated successfully');

    }

    public function destroy(Shahada $shahada): \Illuminate\Http\RedirectResponse
    {
        $shahada->delete();

        return redirect()->route('shahadas.index')
            ->with('Success', 'Shahada deleted successfully');
    }
}
