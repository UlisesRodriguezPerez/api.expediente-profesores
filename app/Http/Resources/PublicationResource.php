<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicationResource extends JsonResource
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
            'coauthors' => $this->coauthors,
            'objectives' => $this->objectives,
            'goals' => $this->goals,
            'dissemination_medium' => $this->dissemination_medium,
            'ORCID' => $this->ORCID,
            'collaborator' => CollaboratorResource::make($this->whenLoaded('collaborator')),
            'publication_type' => PublicationTypeResource::make($this->whenLoaded('publication_type')),
            'students' => StudentResource::collection($this->whenLoaded('students')),
        ];
    }
}
