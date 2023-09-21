<?php

namespace Database\Factories;

use App\Models\Collaborator;
use App\Models\Publication;
use App\Models\PublicationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    protected $model = Publication::class;

    public function definition()
    {
        return [
            'collaborator_id' => Collaborator::inRandomOrder()->first()->id,
            'publication_type_id' => PublicationType::inRandomOrder()->first()->id,
            'name' => $this->faker->sentence(3),
            'coauthors' => $this->faker->name,
            'objectives' => $this->faker->sentence(),
            'goals' => $this->faker->sentence(),
            'dissemination_medium' => $this->faker->word,
            'ORCID' => $this->faker->boolean,
        ];
    }
}
