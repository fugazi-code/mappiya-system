<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssignedUser>
 * 1 = Admin, 2 = Restaurant, 3 = Rider, 4 = Customer
 */
class AssignedUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $role = $this->faker->randomElement([2]);
        $params = [];

        switch ($role) {
            case 2:
                $params = ['entity_id' => Restaurant::factory()->create(), 'entity' => Restaurant::class,];
        }

        $params['user_id'] = User::factory()->create(['roles' => $role]);

        return $params;
    }
}
