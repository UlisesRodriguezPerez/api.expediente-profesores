<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TechnicalTraining;
use App\Http\Requests\StoreTechnicalTrainingRequest;
use App\Http\Requests\UpdateTechnicalTrainingRequest;
use App\Http\Resources\TechnicalTrainingResource;

class TechnicalTrainingController extends Controller
{

    public function index()
    {
        $technicalTrainings = TechnicalTraining::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return TechnicalTrainingResource::collection($technicalTrainings);
    }

    public function store(StoreTechnicalTrainingRequest $request)
    {
        $technicalTraining = new TechnicalTraining();
        $technicalTraining->name = $request->name;
        $technicalTraining->description = $request->description;
        $technicalTraining->save();

        return TechnicalTrainingResource::make($technicalTraining);
    }

    public function show($id)
    {
        $technicalTraining = TechnicalTraining::included()->findOrfail($id);
        return TechnicalTrainingResource::make($technicalTraining);
    }

    public function update(UpdateTechnicalTrainingRequest $request, TechnicalTraining $technicalTraining)
    {
        $technicalTraining->name = $request->name;
        $technicalTraining->description = $request->description;
        $technicalTraining->save();

        return TechnicalTrainingResource::make($technicalTraining);
    }

    public function destroy(TechnicalTraining $technicalTraining)
    {
        $technicalTraining->delete();
        return TechnicalTrainingResource::make($technicalTraining);
    }
}
