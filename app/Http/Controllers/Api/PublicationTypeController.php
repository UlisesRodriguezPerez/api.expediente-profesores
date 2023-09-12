<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PublicationType;
use App\Http\Requests\StorePublicationTypeRequest;
use App\Http\Requests\UpdatePublicationTypeRequest;
use App\Http\Resources\PublicationTypeResource;

class PublicationTypeController extends Controller
{

    public function index()
    {
        $publicationTypes = PublicationType::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return PublicationTypeResource::collection($publicationTypes);
    }

    public function store(StorePublicationTypeRequest $request)
    {
        $publicationType = new PublicationType();
        $publicationType->name = $request->name;
        $publicationType->description = $request->description;
        $publicationType->save();

        return PublicationTypeResource::make($publicationType);
    }

    public function show($id)
    {
        $publicationType = PublicationType::included()->findOrfail($id);
        return PublicationTypeResource::make($publicationType);
    }

    public function update(UpdatePublicationTypeRequest $request, PublicationType $publicationType)
    {
        $publicationType->name = $request->name;
        $publicationType->description = $request->description;
        $publicationType->save();

        return PublicationTypeResource::make($publicationType);
    }

    public function destroy(PublicationType $publicationType)
    {
        $publicationType->delete();
        return PublicationTypeResource::make($publicationType);
    }
}

