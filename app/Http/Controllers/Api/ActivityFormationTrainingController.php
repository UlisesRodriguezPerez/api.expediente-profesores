<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityFormationTrainingResource;
use App\Models\ActivityFormationTraining;
use App\Models\Period;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityFormationTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'name' => 'required',
            'university' => 'required',
            'academic_degree' => 'required',
            'start_year' => 'required',
            'end_year' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $formationTraining = new ActivityFormationTraining();
            $formationTraining->name = $request->name;
            $formationTraining->university = $request->university;
            $formationTraining->academic_degree = $request->academic_degree;
            $formationTraining->start_year = $request->start_year;
            $formationTraining->end_year = $request->end_year;

            $formationTraining->save();

            info('formatuon trainning'. $formationTraining);

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

            $collaborator->activityFormationTrainings()->attach($formationTraining->id, ['period_id' => $currentPeriod->id]);

            return ActivityFormationTrainingResource::make($formationTraining);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityFormationTraining  $activityFormationTraining
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityFormationTraining $activityFormationTraining)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivityFormationTraining  $activityFormationTraining
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityFormationTraining $activityFormationTraining)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityFormationTraining  $activityFormationTraining
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityFormationTraining $activityFormationTraining)
    {
        //
    }
}
