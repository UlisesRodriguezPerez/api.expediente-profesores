<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkloadRequest;
use App\Http\Requests\UpdateWorkloadRequest;
use App\Http\Resources\WorkloadResource;
use App\Models\Workload;

class WorkloadController extends Controller
{

    public function index()
    {
        $workloads = Workload::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return WorkloadResource::collection($workloads);
    }


    public function store(StoreWorkloadRequest $request)
    {
        $workload = new Workload();
        $workload->collaborator_id = $request->collaborator_id;
        $workload->period_id = $request->period_id;
        $workload->workload = $request->workload;
        $workload->save();

        return new WorkloadResource($workload);
    }


    public function show($id)
    {
        $workload = Workload::included()->findOrfail($id);
        return WorkloadResource::make($workload);
    }


    public function update(UpdateWorkloadRequest $request, $id)
    {
        $workload = Workload::findOrFail($id);
        $workload->collaborator_id = $request->collaborator_id;
        $workload->period_id = $request->period_id;
        $workload->workload = $request->workload;
        $workload->save();

        return new WorkloadResource($workload);
    }


    public function destroy(Workload $workload)
    {
        $workload->delete();
        return WorkloadResource::make($workload);
    }
}
