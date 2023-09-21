<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkloadResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'collaborator' => CollaboratorResource::make($this->whenLoaded('collaborator')),
            'period' => PeriodResource::make($this->whenLoaded('period')),
            'workload' => $this->workload,
        ];
    }
}
