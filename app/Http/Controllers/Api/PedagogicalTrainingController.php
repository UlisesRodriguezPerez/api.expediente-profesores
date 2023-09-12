<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PedagogicalTraining;
use App\Http\Requests\StorePedagogicalTrainingRequest;
use App\Http\Requests\UpdatePedagogicalTrainingRequest;
use App\Http\Resources\PedagogicalTrainingResource;

class PedagogicalTrainingController extends Controller 
{

public function index()
{
    $pedagogicalTrainings = PedagogicalTraining::included()
                                ->filter()
                                ->sort()
                                ->getOrPaginate();
    return PedagogicalTrainingResource::collection($pedagogicalTrainings);
}

public function store(StorePedagogicalTrainingRequest $request)
{
    $pedagogicalTraining = new PedagogicalTraining();
    $pedagogicalTraining->name = $request->name;
    $pedagogicalTraining->description = $request->description;
    $pedagogicalTraining->save();

    return PedagogicalTrainingResource::make($pedagogicalTraining);
}

public function show($id)
{
    $pedagogicalTraining = PedagogicalTraining::included()->findOrfail($id);
    return PedagogicalTrainingResource::make($pedagogicalTraining);
}

public function update(UpdatePedagogicalTrainingRequest $request, PedagogicalTraining $pedagogicalTraining)
{
    $pedagogicalTraining->name = $request->name;
    $pedagogicalTraining->description = $request->description;
    $pedagogicalTraining->save();

    return PedagogicalTrainingResource::make($pedagogicalTraining);
}

public function destroy(PedagogicalTraining $pedagogicalTraining)
{
    $pedagogicalTraining->delete();
    return PedagogicalTrainingResource::make($pedagogicalTraining);
}
}
