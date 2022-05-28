<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $ville = $this->faker->city;
        $pays = $this->faker->country;
        $sexe = array('F', 'M');
        $pieceIdentite = array('CIN','Passport','Permis');
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'sexe' => $sexe[rand(0,1)],
            'dateDeNaissance' => $this->faker->dateTimeBetween("2022-01-01","2022-05-25"),
            'lieuDeNaissance' => "$pays, $ville",
            'nationalite' => $this->faker->country,
            'ville' => $ville,
            'pays' => $pays,
            'adresse' => $this->faker->address,
            'telephone1' => $this->faker->phoneNumber,
            'telephone2' => $this->faker->phoneNumber,
            'pieceIdentite' => $pieceIdentite[rand(0,2)],
            'numeroPieceIdentite' => $this->faker->creditCardNumber,
        ];
    }
}
