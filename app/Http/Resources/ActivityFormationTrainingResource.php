<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityFormationTrainingResource extends JsonResource
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
            'university_name' => $this->university,
            'academic_degree' => $this->academic_degree,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year,
            'collaborator' => CollaboratorResource::make($this->whenLoaded('collaborator')),
        ];
    }
}
