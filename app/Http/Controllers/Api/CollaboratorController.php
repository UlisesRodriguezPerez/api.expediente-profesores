<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\Http\Requests\StoreCollaboratorRequest;
use App\Http\Requests\UpdateCollaboratorRequest;
use App\Http\Resources\CollaboratorResource;
use App\Models\TechnicalTraining;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class CollaboratorController extends Controller
{
    const NOT_FILTER = 'not_filter';

    public function index()
    {
        $collaborators = Collaborator::included()
            ->filter()
            ->sort()
            ->exactFilter();

        $total = $collaborators->count();
        $collaborators = $collaborators->getOrPaginate();
        return CollaboratorResource::collection($collaborators)->additional(compact('total'));
    }

    public function store(StoreCollaboratorRequest $request)
    {
        $collaborator = new Collaborator();
        $collaborator->user_id = $request->user_id;
        $collaborator->position_id = $request->position_id;
        $collaborator->category_id = $request->category_id;
        $collaborator->appointment_id = $request->appointment_id;
        $collaborator->degree_id = $request->degree_id;
        $collaborator->campus_id = $request->campus_id;
        $collaborator->save();

        return CollaboratorResource::make($collaborator);
    }

    public function assignCourse(Request $request, Collaborator $collaborator)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'period_id' => 'required|exists:periods,id'
        ]);

        $courseId = $validatedData['course_id'];
        $periodId = $validatedData['period_id'];

        $collaborator->courses()->attach($courseId, ['period_id' => $periodId]);

        return CollaboratorResource::make($collaborator);
    }

    public function assignActivity(Request $request, Collaborator $collaborator)
    {
        // Validar la solicitud
        // ...

        $activitableId = $request->input('activitable_id');
        $activitableType = $request->input('activitable_type');
        $periodId = $request->input('period_id');

        $collaborator->activities()->attach($activitableId, ['activitable_type' => $activitableType, 'period_id' => $periodId]);

        // Retornar respuesta
        // ...
    }

    public function show($id)
    {
        $collaborator = Collaborator::included()->findOrfail($id);
        return CollaboratorResource::make($collaborator);
    }

    public function update(UpdateCollaboratorRequest $request, Collaborator $collaborator)
    {
        $collaborator->user_id = $request->user_id;
        $collaborator->position_id = $request->position_id;
        $collaborator->category_id = $request->category_id;
        $collaborator->appointment_id = $request->appointment_id;
        $collaborator->degree_id = $request->degree_id;
        $collaborator->campus_id = $request->campus_id;
        $collaborator->save();

        return CollaboratorResource::make($collaborator);
    }

    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();
        return CollaboratorResource::make($collaborator);
    }

    public function getHistoryCollaborator($userId, $period_id)
    {
        info('periodId__: ' . $period_id);
        $collaboratorId = Collaborator::where('user_id', $userId)->first()->id;

        // Tu consulta
        $collaborator = Collaborator::with([
            'technicalTrainings',
            'pedagogicalTrainings',
            'internationalizations',
            'activityFormationTrainings',
            'activityGenerals',
            'workloads.period.courses'
        ])->findOrFail($collaboratorId);

        $details = [];

        foreach ($collaborator->workloads as $workload) {
            $period = $workload->period;
            $periodId = $period->id;

            
            info('periodId: ' . $periodId);
            info('period_id: ' . $period_id);
            info('isset: ' . isset($period_id));
    
            if ($periodId != $period_id && $period_id != self::NOT_FILTER) {
                info('hdcvli');
                continue;
            }
            $detailsForPeriod = [
                'period_id' => $periodId,
                'period_name' => $period->name,
                'workload' => $workload->workload,
                'courses_count' => count($period->courses),
                // Calcula el total de todas las actividades
                'total_activities_count' => $collaborator->technicalTrainings->where('pivot.period_id', $periodId)->count() +
                                            $collaborator->pedagogicalTrainings->where('pivot.period_id', $periodId)->count() +
                                            $collaborator->internationalizations->where('pivot.period_id', $periodId)->count() +
                                            $collaborator->activityFormationTrainings->where('pivot.period_id', $periodId)->count() +
                                            $collaborator->activityGenerals->where('pivot.period_id', $periodId)->count(),
            ];

            $details[] = $detailsForPeriod;
        }

        return response()->json($details);
    }
}
