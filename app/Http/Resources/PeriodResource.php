<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeriodResource extends JsonResource
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
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'creator' => CollaboratorResource::make($this->whenLoaded('creator')),
            'activities' => ActivityResource::collection($this->whenLoaded('activities')),   
            'workloads' => WorkloadResource::collection($this->whenLoaded('workloads')),
            'collaborators' => CollaboratorResource::collection($this->whenLoaded('collaborators')),
            'courses' => CourseResource::collection($this->whenLoaded('courses')),
            'technical_trainings' => TechnicalTrainingResource::collection($this->whenLoaded('technicalTrainings')),
            'allActivities' => $this->whenLoaded('allActivities'),
        ];
    }
}
