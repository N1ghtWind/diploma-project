<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'phone' => $this->faker->e164PhoneNumber(),
            'full_name' => $this->faker->name,
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city,
            'zip' => $this->faker->postcode,
        ];
    }
}
