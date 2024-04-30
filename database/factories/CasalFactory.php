<?php

namespace Database\Factories;

use App\Models\Ciutat;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Casal;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CasalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->name(),
            'data_inici' => fake()->date(),
            'data_final' => fake()->date(),
            'n_places' => 10,
            'id_ciutat' => 0
        ];
    }
}
