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
    $publication->name = $request->name;
    $publication->description = $request->description;
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
    $publication->name = $request->name;
    $publication->description = $request->description;
    $publication->save();

    return PublicationResource::make($publication);
}

public function destroy(Publication $publication)
{
    $publication->delete();
    return PublicationResource::make($publication);
}
}