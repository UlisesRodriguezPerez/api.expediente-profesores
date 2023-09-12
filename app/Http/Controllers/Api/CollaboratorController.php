<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\Http\Requests\StoreCollaboratorRequest;
use App\Http\Requests\UpdateCollaboratorRequest;
use App\Http\Resources\CollaboratorResource;

class CollaboratorController extends Controller 
{

public function index()
{
    $collaborators = Collaborator::included()
                                ->filter()
                                ->sort()
                                ->getOrPaginate();
    return CollaboratorResource::collection($collaborators);
}

public function store(StoreCollaboratorRequest $request)
{
    $collaborator = new Collaborator();
    $collaborator->name = $request->name;
    $collaborator->description = $request->description;
    $collaborator->save();

    return CollaboratorResource::make($collaborator);
}

public function show($id)
{
    $collaborator = Collaborator::included()->findOrfail($id);
    return CollaboratorResource::make($collaborator);
}

public function update(UpdateCollaboratorRequest $request, Collaborator $collaborator)
{
    $collaborator->name = $request->name;
    $collaborator->description = $request->description;
    $collaborator->save();

    return CollaboratorResource::make($collaborator);
}

public function destroy(Collaborator $collaborator)
{
    $collaborator->delete();
    return CollaboratorResource::make($collaborator);
}
}