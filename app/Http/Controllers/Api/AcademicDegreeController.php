<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAcademicDegreeRequest;
use App\Http\Requests\UpdateAcademicDegreeRequest;
use App\Http\Resources\AcademicDegreeResource;
use App\Models\AcademicDegree;

class AcademicDegreeController extends Controller
{
    public function index()
    {
        $academicDegrees = AcademicDegree::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return AcademicDegreeResource::collection($academicDegrees);
    }

    public function store(StoreAcademicDegreeRequest $request)
    {
        $academicDegree = new AcademicDegree();
        $academicDegree->name = $request->name;
        $academicDegree->description = $request->description;
        $academicDegree->save();

        return AcademicDegreeResource::make($academicDegree);
    }

    public function show($id)
    {
        $academicDegree = AcademicDegree::included()->findOrfail($id);
        return AcademicDegreeResource::make($academicDegree);
    }

    public function update(UpdateAcademicDegreeRequest $request, AcademicDegree $academicDegree)
    {
        $academicDegree->name = $request->name;
        $academicDegree->description = $request->description;
        $academicDegree->save();

        return AcademicDegreeResource::make($academicDegree);
    }

    public function destroy(AcademicDegree $academicDegree)
    {
        $academicDegree->delete();
        return AcademicDegreeResource::make($academicDegree);
    }
}
