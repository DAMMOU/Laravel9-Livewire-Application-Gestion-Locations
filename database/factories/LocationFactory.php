<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dateDebut' => $this->faker->dateTimeBetween('2022-01-01','2022-01-30'),
            'dateFin' => $this->faker->dateTimeBetween('2022-02-01','2022-03-15'),
            'statut_location_id' => rand(1,3),
            'user_id' => rand(1,10),
            'client_id' => rand(1,10),
        ];
    }
}
