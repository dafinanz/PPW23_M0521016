<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Owner;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('id_ID');
        
        $name = $faker->name();
        $species = $faker->randomElement(['kucing', 'anjing', 'hamster', 'burung']);
        $disease = $faker->randomElement(['diare', 'demam', 'muntah', 'patah tulang']);
        $appointment = $faker->date();

        return [
            'user_id' => User::factory(),
            'owner_id' => Owner::factory(),
            'name' => $name,
            'species' => $species,
            'disease' => $disease,
            'appointment' => $appointment,
        ];
    }
}
