<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deliveryman>
 */
class DeliverymanFactory extends Factory
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
            'plate_no' => $this->faker->randomDigitNotZero(),
            'vehicle_id' => Vehicle::query()->inRandomOrder()->first()->id,
            'profile_image' => $this->faker->imageUrl(),
            'is_blocked' => 0,
            'is_active' => 1,
        ];
    }
}
