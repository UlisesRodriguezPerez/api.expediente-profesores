<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Internationalization;
use App\Http\Requests\StoreInternationalizationRequest;
use App\Http\Requests\UpdateInternationalizationRequest;
use App\Http\Resources\InternationalizationResource;

class InternationalizationController extends Controller 
{

public function index()
{
    $internationalizations = Internationalization::included()
                                ->filter()
                                ->sort()
                                ->getOrPaginate();
    return InternationalizationResource::collection($internationalizations);
}

public function store(StoreInternationalizationRequest $request)
{
    $internationalization = new Internationalization();
    $internationalization->activity_id = $request->activity_id;
    $internationalization->activity_type_id = $request->activity_type_id;
    $internationalization->university_name = $request->university_name;
    $internationalization->save();

    return InternationalizationResource::make($internationalization);
}

public function show($id)
{
    $internationalization = Internationalization::included()->findOrfail($id);
    return InternationalizationResource::make($internationalization);
}

public function update(UpdateInternationalizationRequest $request, Internationalization $internationalization)
{
    $internationalization->activity_id = $request->activity_id;
    $internationalization->activity_type_id = $request->activity_type_id;
    $internationalization->university_name = $request->university_name;
    $internationalization->save();

    return InternationalizationResource::make($internationalization);
}

public function destroy(Internationalization $internationalization)
{
    $internationalization->delete();
    return InternationalizationResource::make($internationalization);
}
}
