<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Http\Resources\PublicationResource;

class PublicationController extends Controller
{

    public function index()
    {
        $publications = Publication::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return PublicationResource::collection($publications);
    }

    public function store(StorePublicationRequest $request)
    {
        $publication = new Publication();
        $publication->collaborator_id = $request->collaborator_id;
        $publication->publication_type_id = $request->publication_type_id;
        $publication->name = $request->name;
        $publication->coauthors = $request->coauthors;
        $publication->objectives = $request->objectives;
        $publication->goals = $request->goals;
        $publication->dissemination_medium = $request->dissemination_medium;
        $publication->ORCID = $request->ORCID;
        $publication->save();

        return PublicationResource::make($publication);
    }

    public function show($id)
    {
        $publication = Publication::included()->findOrfail($id);
        return PublicationResource::make($publication);
    }

    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        $publication->collaborator_id = $request->collaborator_id;
        $publication->publication_type_id = $request->publication_type_id;
        $publication->name = $request->name;
        $publication->coauthors = $request->coauthors;
        $publication->objectives = $request->objectives;
        $publication->goals = $request->goals;
        $publication->dissemination_medium = $request->dissemination_medium;
        $publication->ORCID = $request->ORCID;
        $publication->save();

        return PublicationResource::make($publication);
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return PublicationResource::make($publication);
    }
}
