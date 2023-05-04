<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Customer;
use App\Models\Restaurant;
use App\Enums\UserRolesEnum;
use App\Models\Deliveryman;
use Illuminate\Support\Str;
use App\Models\MenuCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // 1 = Admin, 2 = Restaurant, 3 = Rider, 4 = Customer
        $role = $this->faker->randomElement([
            UserRolesEnum::SHOP->value,
            UserRolesEnum::RIDER->value,
            UserRolesEnum::CUSTOMER->value
        ]);

        switch ($role) {
            case 2:
                $factory = Restaurant::factory()
                    ->afterCreating(function (Restaurant $model) {
                        $model->addMedia($this->faker->image())->toMediaCollection('banner');
                    })
                    ->has(
                        MenuCategory::factory(10)->has(Menu::factory(10))
                    )->create();
                $class = Restaurant::class;
                break;
            case 3:
                $factory = Deliveryman::factory()->create();
                $class = Deliveryman::class;
                break;
            case 4:
                $factory = Customer::factory()->create();
                $class = Customer::class;
                break;
        }

        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
            'roles' => $role,
            'info_id' => $factory,
            'info_type' => $class,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
