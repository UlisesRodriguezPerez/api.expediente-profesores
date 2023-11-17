<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityGeneralResource;
use App\Models\ActivityGeneral;
use App\Models\Collaborator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityGeneralController extends Controller
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
        info('resquest activity');
        $request->validate([
            'name' => 'required|string',
            'hours' => 'required|string',
        ]);

        DB::transaction(function () use ($request) {
            $activityGeneral = new ActivityGeneral();
            $activityGeneral->name = $request->name;
            $activityGeneral->hours = $request->hours;
            $activityGeneral->save();
    
            //$user = User::find($request->teacher); //no se si teacher trae 
            $collaborator = Collaborator::find($request->teacher);
    
            if (!$collaborator ) {
                throw new Exception('Fallo en el sistema.');
            }
    
            $collaborator->activityGenerals()->attach($activityGeneral->id, ['period_id' => $request->period]);
    
            return ActivityGeneralResource::make($activityGeneral);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityGeneral  $activityGeneral
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityGeneral $activityGeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivityGeneral  $activityGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityGeneral $activityGeneral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityGeneral  $activityGeneral
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityGeneral $activityGeneral)
    {
        //
    }
}
