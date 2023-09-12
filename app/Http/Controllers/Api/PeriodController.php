<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Http\Resources\PeriodResource;

class PeriodController extends Controller
{

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
        $period = new Period();
        $period->creator_id = $request->creator_id;
        $period->name = $request->name;
        $period->start_date = $request->start_date;
        $period->end_date = $request->end_date;
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
        $period->creator_id = $request->creator_id;
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
