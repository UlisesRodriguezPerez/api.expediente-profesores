<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'collaborators' => CollaboratorResource::collection($this->whenLoaded('collaborators')),
            'periods' => PeriodResource::collection($this->whenLoaded('periods')),
        ];
    }
}
