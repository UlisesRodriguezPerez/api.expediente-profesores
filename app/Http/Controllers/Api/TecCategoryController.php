<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TecCategory;
use App\Http\Requests\StoreTecCategoryRequest;
use App\Http\Requests\UpdateTecCategoryRequest;
use App\Http\Resources\TecCategoryResource;

class TecCategoryController extends Controller
{

    public function index()
    {
        $tecCategorys = TecCategory::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return TecCategoryResource::collection($tecCategorys);
    }

    public function store(StoreTecCategoryRequest $request)
    {
        $tecCategory = new TecCategory();
        $tecCategory->name = $request->name;
        $tecCategory->description = $request->description;
        $tecCategory->save();

        return TecCategoryResource::make($tecCategory);
    }

    public function show($id)
    {
        $tecCategory = TecCategory::included()->findOrfail($id);
        return TecCategoryResource::make($tecCategory);
    }

    public function update(UpdateTecCategoryRequest $request, TecCategory $tecCategory)
    {
        $tecCategory->name = $request->name;
        $tecCategory->description = $request->description;
        $tecCategory->save();

        return TecCategoryResource::make($tecCategory);
    }

    public function destroy(TecCategory $tecCategory)
    {
        $tecCategory->delete();
        return TecCategoryResource::make($tecCategory);
    }
}
