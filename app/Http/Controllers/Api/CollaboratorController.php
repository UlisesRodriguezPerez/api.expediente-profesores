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
        $collaborator->user_id = $request->user_id;
        $collaborator->position_id = $request->position_id;
        $collaborator->category_id = $request->category_id;
        $collaborator->appointment_id = $request->appointment_id;
        $collaborator->degree_id = $request->degree_id;
        $collaborator->campus_id = $request->campus_id;
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
        $collaborator->user_id = $request->user_id;
        $collaborator->position_id = $request->position_id;
        $collaborator->category_id = $request->category_id;
        $collaborator->appointment_id = $request->appointment_id;
        $collaborator->degree_id = $request->degree_id;
        $collaborator->campus_id = $request->campus_id;
        $collaborator->save();

        return CollaboratorResource::make($collaborator);
    }

    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();
        return CollaboratorResource::make($collaborator);
    }
}
