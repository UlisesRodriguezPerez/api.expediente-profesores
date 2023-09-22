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
        // cont total before pagination
        $workloads = Workload::included()
            ->filter()
            ->sort();

        $total = $workloads->count();
        $workloads = $workloads->paginate(10);
        return WorkloadResource::collection($workloads)->additional(compact('total'));
    }


    public function store(StoreWorkloadRequest $request)
    {
        $workload = new Workload();
        $workload->collaborator_id = $request->collaborator_id;
        $workload->period_id = $request->period_id;
        $workload->workload = $request->workload;
        $workload->save();

        return WorkloadResource::make($workload);
    }


    public function show($id)
    {
        $workload = Workload::included()->findOrfail($id);
        return WorkloadResource::make($workload);
    }


    public function update(UpdateWorkloadRequest $request, $id)
    {
        info('collaborator_id: ' . $request->collaborator_id);
info('period_id: ' . $request->period_id);
info('workload: ' . $request->workload);
        info('update');
        info($request->all());
        $workload = Workload::findOrFail($id);
        $workload->collaborator_id = $request->collaborator_id;
        $workload->period_id = $request->period_id;
        $workload->workload = $request->workload;
        $workload->save();

        return WorkloadResource::make($workload);
    }


    public function destroy(Workload $workload)
    {
        $workload->delete();
        return WorkloadResource::make($workload);
    }
}
