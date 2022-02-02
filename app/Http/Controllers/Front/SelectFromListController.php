<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\SelectFromListResource;
use App\Models\SelectFromList;
use Illuminate\Http\Request;

class SelectFromListController extends Controller
{
    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SelectFromListResource::collection(
            SelectFromList::where('language_id', $request->language_id)
                ->get());
    }
}
