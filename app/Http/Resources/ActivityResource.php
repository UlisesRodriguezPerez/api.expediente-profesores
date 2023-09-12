<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            'period' => PeriodResource::make($this->whenLoaded('period')),
            'creator' => CollaboratorResource::make($this->whenLoaded('creator')),
            'involved' => CollaboratorResource::collection($this->whenLoaded('involved')),
            'internationalization' => InternationalizationResource::make($this->whenLoaded('internationalization')),
            'technical_training' => TechnicalTrainingResource::make($this->whenLoaded('technical_training')),
            'pedagogical_training' => PedagogicalTrainingResource::make($this->whenLoaded('pedagogical_training')),
        ];
    }
}
