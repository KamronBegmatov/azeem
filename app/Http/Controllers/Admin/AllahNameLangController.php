<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AllahNameLangResource;
use App\Models\AllahNameLang;
use Illuminate\Http\Request;

class AllahNameLangController extends Controller
{

    public function index(Request $request)
    {
        $allahNameLangs = AllahNameLang::where('iso_code', $request->lang)->with('allah_name');
        return AllahNameLangResource::collection($allahNameLangs->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'allah_name_id' => 'required|exists:allah_names,id',
            'name' => 'required',
            'iso_code' => 'required|exists:languages,iso_code',
        ]);
        $allahNameLang = AllahNameLang::create([
            'allah_name_id' => $request->allah_name_id,
            'name' => $request->name,
            'iso_code' => $request->iso_code,
        ]);
        return new AllahNameLangResource($allahNameLang);
    }

    public function show(AllahNameLang $allahNameLang)
    {
        return new AllahNameLangResource($allahNameLang);
    }

    public function update(Request $request, AllahNameLang $allahNameLang)
    {
        $request->validate([
            'allah_name_id' => 'exists:allah_names,id',
            'iso_code' => 'exists:languages,iso_code',
        ]);
        if ($request->has('allah_name_id')) {
            $allahNameLang->allah_name_id = $request->allah_name_id;
        }
        if ($request->has('name')) {
            $allahNameLang->name = $request->name;
        }
        if ($request->has('iso_code')) {
            $allahNameLang->iso_code = $request->iso_code;
        }
        $allahNameLang->save();
        return new AllahNameLangResource($allahNameLang);

    }

    public function destroy(AllahNameLang $allahNameLang)
    {
        try {
            $allahNameLang->delete();
        } catch (\Exception $e) {
            return response()->json([
                'code' => Controller::CODE_DB_TRANSACTION,
                'message' => $e->getMessage(),
            ], 400);
        }
        return $allahNameLang->id;
    }
}
