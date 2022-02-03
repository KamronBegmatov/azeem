<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReciterRequest;
use App\Models\Reciter;
use Illuminate\Http\Request;

class ReciterController extends Controller
{
    public function index()
    {
        return view('content.reciters.index', ['reciters' => Reciter::paginate(20)]);
    }

    public function create()
    {
        return view('content.reciters.create');
    }

    public function store(StoreReciterRequest $request): \Illuminate\Http\RedirectResponse
    {
        Reciter::add($request);

        return redirect()->route('reciters.index')
            ->with('Success', 'Reciter created successfully');
    }

    public function edit(Reciter $reciter)
    {
        return view('content.reciters.edit', compact('reciter'));
    }

    public function update(Request $request, Reciter $reciter): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'image' => 'file',
        ]);

        $reciter->edit($request);

        return redirect()->route('reciters.index')
            ->with('Success', 'Reciter updated successfully');
    }

    public function destroy(Reciter $reciter): \Illuminate\Http\RedirectResponse
    {
        $reciter->delete();

        return redirect()->route('reciters.index')
            ->with('Success', 'Reciter deleted successfully');
    }
}
