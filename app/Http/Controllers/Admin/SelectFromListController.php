<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSystemWordRequest;
use App\Http\Requests\UpdateSelectFromListRequest;
use App\Models\SelectFromList;

class SelectFromListController extends Controller
{
    public function index()
    {
        return view('content.select_from_lists.index', ['select_from_lists' => SelectFromList::with('language')->paginate(20)]);
    }

    public function create()
    {
        return view('content.select_from_lists.create');
    }

    public function store(StoreSystemWordRequest $request): \Illuminate\Http\RedirectResponse
    {
        SelectFromList::add($request);

        return redirect()->route('select_from_lists.index')
            ->with('Success','Select created successfully');
    }

    public function edit(SelectFromList $select_from_list)
    {
        return view('content.select_from_lists.edit', compact('select_from_list'));
    }

    public function update(UpdateSelectFromListRequest $request, SelectFromList $select_from_list): \Illuminate\Http\RedirectResponse
    {
        $select_from_list->update($request->all);

        return redirect()->route('select_from_lists.index')
            ->with('Success','Select updated successfully');
    }

    public function destroy(SelectFromList $select_from_list)
    {
        try {
            $select_from_list->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return  redirect()->route('select_from_lists.index')
            ->with('Success','Select deleted successfully');
    }
}
