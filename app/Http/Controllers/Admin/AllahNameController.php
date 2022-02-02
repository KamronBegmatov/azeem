<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AllahName;
use Illuminate\Http\Request;

class AllahNameController extends Controller
{

    public function index()
    {
        return view('content.allah_names.index', ['allah_names' => AllahName::all()]);
    }

    public function create()
    {
        return view('content.allah_names.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:allah_names,name',
        ]);

        AllahName::create([
            'name' => $request->name,
        ]);

        return redirect()->route('allah_names.index')
            ->with('Success', 'Allah name created successfully');
    }

    public function edit(AllahName $allah_name)
    {
        return view('content.allah_names.edit', ['allah_name' => $allah_name]);
    }

    public function update(Request $request, AllahName $allah_name): \Illuminate\Http\RedirectResponse
    {
        $allah_name->update(['name' => $request->name]);

        return redirect()->route('allah_names.index')
            ->with('Success', 'Allah name updated successfully');
    }

    public function destroy(AllahName $allah_name): \Illuminate\Http\RedirectResponse
    {
        $allah_name->delete();

        return redirect()->route('allah_names.index')
            ->with('Success', 'Allah name deleted successfully');
    }
}
