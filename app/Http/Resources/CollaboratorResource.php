<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CollaboratorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => UserResource::make($this->whenLoaded('user')),
            'position' => PositionResource::make($this->whenLoaded('position')),
            'category' => TecCategoryResource::make($this->whenLoaded('category')),
            'appointment' => AppointmentTypeResource::make($this->whenLoaded('appointment')),
            'degree' => AcademicDegreeResource::make($this->whenLoaded('degree')),
            'campus' => CampusResource::make($this->whenLoaded('campus')),
            'periods' => PeriodResource::collection($this->whenLoaded('periods')),
            'created_activities' => ActivityResource::collection($this->whenLoaded('created_activities')),
            'involved_activities' => ActivityResource::collection($this->whenLoaded('involved_activities')),
            'publications' => PublicationResource::collection($this->whenLoaded('publications')),
            'work_units_and_additional_courses' => WorkUnitAndAdditionalCourseResource::collection($this->whenLoaded('work_units_and_additional_courses')),
            'workloads' => WorkloadResource::collection($this->whenLoaded('workloads')),
        ];
    }
}
