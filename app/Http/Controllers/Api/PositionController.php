<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Http\Resources\PositionResource;

class PositionController extends Controller 
{

public function index()
{
    $positions = Position::included()
                                ->filter()
                                ->sort()
                                ->getOrPaginate();
    return PositionResource::collection($positions);
}

public function store(StorePositionRequest $request)
{
    $position = new Position();
    $position->name = $request->name;
    $position->description = $request->description;
    $position->save();

    return PositionResource::make($position);
}

public function show($id)
{
    $position = Position::included()->findOrfail($id);
    return PositionResource::make($position);
}

public function update(UpdatePositionRequest $request, Position $position)
{
    $position->name = $request->name;
    $position->description = $request->description;
    $position->save();

    return PositionResource::make($position);
}

public function destroy(Position $position)
{
    $position->delete();
    return PositionResource::make($position);
}
}