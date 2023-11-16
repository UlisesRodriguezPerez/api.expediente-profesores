<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TechnicalTraining;
use App\Http\Requests\StoreTechnicalTrainingRequest;
use App\Http\Requests\UpdateTechnicalTrainingRequest;
use App\Http\Resources\TechnicalTrainingResource;
use App\Models\Period;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class TechnicalTrainingController extends Controller
{

    public function index()
    {
        $technicalTrainings = TechnicalTraining::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return TechnicalTrainingResource::collection($technicalTrainings);
    }

    public function store(StoreTechnicalTrainingRequest $request)
    {
        DB::transaction(function () use ($request) {
            $technicalTraining = new TechnicalTraining();
            $technicalTraining->training_type_id = $request->training_type_id;
            $technicalTraining->name = $request->name;
            $technicalTraining->save();

            info('Technic trainning'. $technicalTraining);

            $user = User::find($request->user_id);
            $collaborator = $user->collaborator;

            if (!$user) {
                throw new Exception('Fallo en el sistema.');
            }
            if (!$collaborator) {
                throw new Exception('Fallo en el sistema.');
            }

            $today = Carbon::now();

            $currentPeriod = Period::where('start_date', '<=', $today)
                ->where('end_date', '>=', $today)
                ->first();

            if (!$currentPeriod) {
                throw new Exception('Fallo en el sistema.');
            }

            $collaborator->technicalTrainings()->attach($technicalTraining->id, ['period_id' => $currentPeriod->id]);

            return TechnicalTrainingResource::make($technicalTraining);
        });
    }

    public function show($id)
    {
        $technicalTraining = TechnicalTraining::included()->findOrfail($id);
        return TechnicalTrainingResource::make($technicalTraining);
    }

    public function update(UpdateTechnicalTrainingRequest $request, TechnicalTraining $technicalTraining)
    {
        $technicalTraining->training_type_id = $request->training_type_id;
        $technicalTraining->activity_id = $request->activity_id;
        $technicalTraining->institution_name = $request->institution_name;
        $technicalTraining->semester_hours = $request->semester_hours;
        $technicalTraining->save();

        return TechnicalTrainingResource::make($technicalTraining);
    }

    public function destroy(TechnicalTraining $technicalTraining)
    {
        $technicalTraining->delete();
        return TechnicalTrainingResource::make($technicalTraining);
    }
}
