<?php

namespace Database\Factories;

use App\Models\ModuleHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModuleHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Id_Module' => \App\Models\Module::factory(),
            'value' => $this->faker->randomFloat(2, 0, 100), // valeur random entre 0 et 100
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'), // date random entre le mois derniere et le maitenant
        ];
    }
}

