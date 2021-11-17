<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AllahName;
use Illuminate\Http\Request;

class AllahNameController extends Controller
{

    public function index()
    {
        return AllahName::get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $allahName = AllahName::create([
            'name' => $request->name,
        ]);
        return $allahName;
    }

    public function show(AllahName $allahName)
    {
        return $allahName;
    }

    public function update(Request $request, AllahName $allahName)
    {
        if ($request->has('name')) {
            $allahName->name = $request->name;
        }
        $allahName->save();
        return $allahName;
    }

    public function destroy(AllahName $allahName)
    {
        try {
            $allahName->delete();
        } catch (\Exception $e) {
            return response()->json([
                'code' => Controller::CODE_DB_TRANSACTION,
                'message' => $e->getMessage(),
            ], 400);
        }
        return $allahName->id;
    }
}
