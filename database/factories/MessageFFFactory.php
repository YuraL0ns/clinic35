<?php

namespace Database\Factories;

use App\Models\MessageFF;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MessageFF>
 */
class MessageFFFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber
        ];
    }
}
