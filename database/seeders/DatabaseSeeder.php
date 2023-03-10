<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();

        User::factory()->create([
            'user_type' => 'basicEd',
            'email' => 'faculty@email.com',
            'password' => bcrypt('faculty123'),
        ]);

        User::factory()->create([
            'user_type' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
