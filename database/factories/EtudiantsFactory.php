<?php

namespace Database\Factories;

use App\Models\Etudiants;
use App\Models\Villes;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiants::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'etudiant_nom' => $this->faker->name(),
            'etudiant_adresse' => $this->faker->address(),
            'etudiant_phone' => $this->faker->phoneNumber(),
            'etudiant_email' => $this->faker->email(),
            'etudiant_dateNaissance' => $this->faker->date('Y-m-d', 'now'),
            'ville_id' => Villes::all()->random()->id
        ];
    }
}
