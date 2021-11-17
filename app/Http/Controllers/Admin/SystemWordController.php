<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SystemWordResource;
use App\Models\SystemWord;
use Illuminate\Http\Request;

class SystemWordController extends Controller
{
    public function index(Request $request)
    {
        $systemWords = SystemWord::where('iso_code', $request->lang);
        $pages = 10;
        if ($request->has('per_page')) {
            $pages = $request->per_page;
        }
        return SystemWordResource::collection($systemWords->paginate($pages));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'iso_code' => 'required|exists:languages,iso_code',
        ]);
        $systemWord = SystemWord::create([
            'title' => $request->title,
            'text' => $request->text,
            'iso_code' => $request->iso_code,
        ]);
        return new SystemWordResource($systemWord);
    }

    public function show(SystemWord $systemWord)
    {
        return new SystemWordResource($systemWord);
    }

    public function update(Request $request, SystemWord $systemWord)
    {
        $request->validate([
            'iso_code' => 'exists:languages,iso_code',
        ]);
        if ($request->has('title')) {
            $systemWord->title = $request->title;
        }
        if ($request->has('text')) {
            $systemWord->text = $request->text;
        }
        if ($request->has('iso_code')) {
            $systemWord->iso_code = $request->iso_code;
        }
        $systemWord->save();
        return new SystemWordResource($systemWord);
    }

    public function destroy(SystemWord $systemWord)
    {
        try {
            $systemWord->delete();
        } catch (\Exception $e) {
            return response()->json([
                'code' => Controller::CODE_DB_TRANSACTION,
                'message' => $e->getMessage(),
            ], 400);
        }
        return $systemWord->id;
    }
}
