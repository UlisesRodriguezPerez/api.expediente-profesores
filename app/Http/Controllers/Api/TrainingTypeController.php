<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TrainingType;
use App\Http\Requests\StoreTrainingTypeRequest;
use App\Http\Requests\UpdateTrainingTypeRequest;
use App\Http\Resources\TrainingTypeResource;

class TrainingTypeController extends Controller
{

    public function index()
    {
        $trainingTypes = TrainingType::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return TrainingTypeResource::collection($trainingTypes);
    }

    public function store(StoreTrainingTypeRequest $request)
    {
        $trainingType = new TrainingType();
        $trainingType->name = $request->name;
        $trainingType->description = $request->description;
        $trainingType->save();

        return TrainingTypeResource::make($trainingType);
    }

    public function show($id)
    {
        $trainingType = TrainingType::included()->findOrfail($id);
        return TrainingTypeResource::make($trainingType);
    }

    public function update(UpdateTrainingTypeRequest $request, TrainingType $trainingType)
    {
        $trainingType->name = $request->name;
        $trainingType->description = $request->description;
        $trainingType->save();

        return TrainingTypeResource::make($trainingType);
    }

    public function destroy(TrainingType $trainingType)
    {
        $trainingType->delete();
        return TrainingTypeResource::make($trainingType);
    }
}
