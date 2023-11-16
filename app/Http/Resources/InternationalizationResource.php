<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InternationalizationResource extends JsonResource
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
            'activity_type' => ActivityTypeResource::make($this->whenLoaded('activity_type')),
            'university_name' => $this->university_name,
            'country' => $this->country,
            'collaborator' => CollaboratorResource::make($this->whenLoaded('collaborator')),
        ];
    }
}
