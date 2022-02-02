<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSystemWordRequest;
use App\Models\Language;
use App\Models\SystemWord;
use Illuminate\Http\Request;

class SystemWordController extends Controller
{
    public function index()
    {
        return view('content.system_words.index', ['system_words' => SystemWord::with('language')->paginate(20)]);
    }

    public function create()
    {
        return view('content.system_words.create', ['languages' => Language::all()]);
    }

    public function store(StoreSystemWordRequest $request): \Illuminate\Http\RedirectResponse
    {
        SystemWord::add($request);

        return redirect()->route('system_words.index')
            ->with('Success','System word created successfully');
    }

    public function edit(SystemWord $system_word)
    {
        return view('content.system_words.edit', ['system_word' => $system_word, 'languages' => Language::all()]);
    }

    public function update(Request $request, SystemWord $system_word): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'string',
            'text' => 'string',
            'language_id' => 'exists:languages,id',
        ]);

        $system_word->update($request->all());

        return redirect()->route('system_words.index')
            ->with('Success','System word updated successfully');
    }

    public function destroy(SystemWord $system_word)
    {
        try {
            $system_word->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return  redirect()->route('system_words.index')
            ->with('Success','System word deleted successfully');
    }
}
