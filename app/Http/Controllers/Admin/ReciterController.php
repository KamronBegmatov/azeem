<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ReciterResource;
use App\Models\Reciter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Intervention;

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'info' => 'required',
            'style' => 'required',
            'image' => 'required|file',
        ]);

        $image = Intervention::make($request->image);

        if (!file_exists('storage/reciters/')) {
            mkdir('storage/reciters/', 0777, true);
        }

        $image->save(public_path('storage/reciters/' . $image->filename . '.webp'));

        Reciter::create([
            'name' => $request->name,
            'info' => $request->info,
            'style' => $request->style,
            'image' => 'reciters/' . $image->filename . '.webp',
        ]);

        return redirect()->route('reciters.index')
            ->with('Success','Languages created successfully');
    }

    public function show(Reciter $reciter)
    {
        return new ReciterResource($reciter);
    }

    public function edit(Reciter $reciter)
    {
        return view('content.reciters.edit',compact('reciter'));
    }

    public function update(Request $request, Reciter $reciter)
    {
        $request->validate([
            'image' => 'file',
        ]);

        if ($request->has('name')) {
            $reciter->name = $request->name;
        }

        if ($request->has('info')) {
            $reciter->info = $request->info;
        }

        if ($request->has('style')) {
            $reciter->style = $request->style;
        }

        if ($request->has('image')) {
            Storage::disk('public')->delete($reciter->image);
            $image = Intervention::make($request->image);
            $image->save(public_path('storage/reciters/'.$image->filename.'.webp'));
            $reciter->image = 'reciters/'.$image->filename.'.webp';
        }

        $reciter->save();

        return new ReciterResource($reciter);
    }

    public function destroy(Reciter $reciter)
    {
        try {
            $reciter->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return  redirect()->route('reciters.index')
            ->with('Success', 'Reciter deleted successfully');
    }
}
