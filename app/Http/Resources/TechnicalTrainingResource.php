<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TechnicalTrainingResource extends JsonResource
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
            'hours' => $this->hours,
            'objective' => $this->objective,
            'activity' => ActivityResource::make($this->whenLoaded('activity')),
            'training_type' => TrainingTypeResource::make($this->whenLoaded('training_type')),
        ];
    }
}
