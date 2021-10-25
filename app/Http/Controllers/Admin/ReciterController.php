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
    public function index(Request $request)
    {
        $reciters = Reciter::query();
        $pages = 10;
        if ($request->has('per_page')) {
            $pages = $request->per_page;
        }
        return ReciterResource::collection($reciters->paginate($pages));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'info' => 'required',
            'image' => 'required|file',
        ]);
        $image = Intervention::make($request->image)->resize(500, 500);
        $image->save(public_path('storage/reciters/' . $image->filename . '.webp'));
        $reciter = Reciter::create([
            'name' => $request->name,
            'info' => $request->info,
            'image' => 'reciters/' . $image->filename . '.webp',
        ]);
        return new ReciterResource($reciter);
    }

    public function show(Reciter $reciter)
    {
        return new ReciterResource($reciter);
    }

    public function update(Request $request, Reciter $reciter)
    {
        if ($request->has('image')) {
            $image = $reciter->image;
            Storage::disk('public')->delete($image);
            $image_new = Intervention::make($request->image)->resize(500, 500);
            $image_new->save(public_path('storage/reciters/'.$image_new->filename.'.webp'));
        }
        $reciter->update([
            'name' => $request->name,
            'info' => $request->info,
            'image' => 'reciters/'.$image_new->filename.'.webp',
        ]);
        return new ReciterResource($reciter);
    }

    public function destroy(Reciter $reciter)
    {
        try {
            $reciter->delete();
        } catch (\Exception $e) {
            return response()->json([
                'code' => Controller::CODE_DB_TRANSACTION,
                'message' => $e->getMessage(),
            ], 400);
        }
        return $reciter->id;
    }
}
