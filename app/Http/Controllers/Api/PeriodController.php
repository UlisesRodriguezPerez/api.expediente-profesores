<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Http\Resources\PeriodResource;
use Carbon\Carbon;

class PeriodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $periods = Period::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return PeriodResource::collection($periods);
    }

    public function store(StorePeriodRequest $request)
    {
        info('PeriodController@store');
        info($request->all());
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d H:i:s');
        $period = new Period();
        $period->name = $request->name;
        $period->start_date = $start_date;
        $period->end_date = $end_date;

        $collaborator = auth()->user()->collaborator;
        if($collaborator) {
            $period->creator_id = $collaborator->id;
        } else {
            return response()->json(['error' => 'Collaborator not found'], 400);
        }
        $period->save();

        return PeriodResource::make($period);
    }

    public function show($id)
    {
        $period = Period::included()->findOrfail($id);
        return PeriodResource::make($period);
    }

    public function update(UpdatePeriodRequest $request, Period $period)
    {
        // $period->creator_id = $request->creator_id;
        $period->name = $request->name;
        $period->start_date = $request->start_date;
        $period->end_date = $request->end_date;
        $period->save();

        return PeriodResource::make($period);
    }

    public function destroy(Period $period)
    {
        $period->delete();
        return PeriodResource::make($period);
    }
}
