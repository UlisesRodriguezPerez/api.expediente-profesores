<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Internationalization;
use App\Http\Requests\StoreInternationalizationRequest;
use App\Http\Requests\UpdateInternationalizationRequest;
use App\Http\Resources\InternationalizationResource;
use App\Models\Period;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

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
    /*
    $internationalization = new Internationalization();
    $internationalization->activity_id = $request->activity_id;
    $internationalization->activity_type_id = $request->activity_type_id;
    $internationalization->university_name = $request->university_name;
    $internationalization->save();

    return InternationalizationResource::make($internationalization); */

    DB::transaction(function () use ($request) {
        $internationalization = new Internationalization();
        $internationalization->name = $request->name;
        $internationalization->activity_type_id = $request->activity_type_id;
        $internationalization->university_name = $request->university_name;
        $internationalization->country = $request->country;
        $internationalization->save();

        $user = User::find($request->user_id);
        $collaborator = $user->collaborator;

        if (!$user ) {
            throw new Exception('Fallo en el sistema.');
        }
        if (!$collaborator ) {
            throw new Exception('Fallo en el sistema.');
        }

        $today = Carbon::now();

        $currentPeriod = Period::where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            ->first();

        if (!$currentPeriod ){
            throw new Exception('Fallo en el sistema.');
        }

        info('currentPeriod' . $currentPeriod);


        $collaborator->internationalizations()->attach($internationalization->id, ['period_id' => $currentPeriod->id]);

        return InternationalizationResource::make($internationalization);
    });

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
