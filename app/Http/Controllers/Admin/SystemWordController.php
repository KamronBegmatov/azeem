<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SystemWordResource;
use App\Models\SystemWord;
use Illuminate\Http\Request;

class SystemWordController extends Controller
{
    public function index()
    {
        return view('content.system_words.index', ['system_words' => SystemWord::paginate(20)]);
    }

    public function create(){
        return view('content.system_words.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'iso_code' => 'required|exists:languages,iso_code',
        ]);

        SystemWord::create([
            'title' => $request->title,
            'text' => $request->text,
            'iso_code' => $request->iso_code,
        ]);

        return redirect()->route('system_words.index')
            ->with('Success','System word created successfully');
    }

    public function show(SystemWord $system_word)
    {
        return new SystemWordResource($system_word);
    }

    public function edit(SystemWord $system_word)
    {
        return view('content.system_words.edit', compact('system_word'));
    }

    public function update(Request $request, SystemWord $system_word)
    {
        $request->validate([
            'iso_code' => 'exists:languages,iso_code',
        ]);

        if ($request->has('title')) {
            $system_word->title = $request->title;
        }

        if ($request->has('text')) {
            $system_word->text = $request->text;
        }

        if ($request->has('iso_code')) {
            $system_word->iso_code = $request->iso_code;
        }

        $system_word->save();

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
