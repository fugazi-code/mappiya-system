<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AssignedUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create([
             'name' => 'Admin User',
             'email' => 'admin@example.com',
             'roles' => 1,
         ]);

        User::factory()->create([
            'name' => 'Restaurant User',
            'email' => 'restaurant@example.com',
            'roles' => 2,
        ]);

        User::factory()->create([
            'name' => 'Rider User',
            'email' => 'rider@example.com',
            'roles' => 3,
        ]);

        User::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'roles' => 4,
        ]);

        AssignedUser::factory(10)->create();
    }
}
