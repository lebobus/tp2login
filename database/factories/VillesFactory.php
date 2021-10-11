<?php

namespace Database\Factories;

use App\Models\Villes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class VillesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Villes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ville_nom' => $this->faker->city()
        ];
    }
}
