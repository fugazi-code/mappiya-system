<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'phone_no' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'profile_image' => $this->faker->imageUrl(),
            'is_blocked' => 0,
            'is_active' => 1,
        ];
    }
}
