<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'paid_amount' => $this->faker->randomFloat(2, 0, 100),
            'intent_id' => $this->faker->uuid,
            'receipt_url' => $this->faker->url,
            'created_at' => now()->addMinutes(rand(1, 60)),
        ];
    }
}
