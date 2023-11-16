<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PedagogicalTraining;
use App\Http\Requests\StorePedagogicalTrainingRequest;
use App\Http\Requests\UpdatePedagogicalTrainingRequest;
use App\Http\Resources\PedagogicalTrainingResource;
use App\Models\Collaborator;
use App\Models\Period;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class PedagogicalTrainingController extends Controller
{

    public function index()
    {
        $pedagogicalTrainings = PedagogicalTraining::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return PedagogicalTrainingResource::collection($pedagogicalTrainings);
    }

    public function store(StorePedagogicalTrainingRequest $request)
    {
        DB::transaction(function () use ($request) {
            $pedagogicalTraining = new PedagogicalTraining();
            $pedagogicalTraining->name = $request->name;
            $pedagogicalTraining->institution_name = $request->institution_name;
            $pedagogicalTraining->save();

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


            $collaborator->pedagogicalTrainings()->attach($pedagogicalTraining->id, ['period_id' => $currentPeriod->id]);

            return PedagogicalTrainingResource::make($pedagogicalTraining);
        });
    }

    public function show($id)
    {
        $pedagogicalTraining = PedagogicalTraining::included()->findOrfail($id);
        return PedagogicalTrainingResource::make($pedagogicalTraining);
    }

    public function update(UpdatePedagogicalTrainingRequest $request, PedagogicalTraining $pedagogicalTraining)
    {
        $pedagogicalTraining->activity_id = $request->activity_id;
        $pedagogicalTraining->institution_name = $request->institution_name;
        $pedagogicalTraining->save();

        return PedagogicalTrainingResource::make($pedagogicalTraining);
    }

    public function destroy(PedagogicalTraining $pedagogicalTraining)
    {
        $pedagogicalTraining->delete();
        return PedagogicalTrainingResource::make($pedagogicalTraining);
    }
}
