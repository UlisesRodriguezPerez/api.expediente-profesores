<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Http\Requests\StoreCampusRequest;
use App\Http\Requests\UpdateCampusRequest;
use App\Http\Resources\CampusResource;

class CampusController extends Controller
{

    public function index()
    {
        $campuss = Campus::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return CampusResource::collection($campuss);
    }

    public function store(StoreCampusRequest $request)
    {
        $campus = new Campus();
        $campus->name = $request->name;
        $campus->description = $request->description;
        $campus->acronym = $request->acronym;
        $campus->save();

        return CampusResource::make($campus);
    }

    public function show($id)
    {
        $campus = Campus::included()->findOrfail($id);
        return CampusResource::make($campus);
    }

    public function update(UpdateCampusRequest $request, Campus $campus)
    {
        $campus->name = $request->name;
        $campus->description = $request->description;
        $campus->acronym = $request->acronym;
        $campus->save();

        return CampusResource::make($campus);
    }

    public function destroy(Campus $campus)
    {
        $campus->delete();
        return CampusResource::make($campus);
    }
}
