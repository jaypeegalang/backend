<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create([
            'name' => 'jaypee',
            'email'=> 'admin@admin.com',
            'mobile_number' => '064738034',
            'password' => Hash::make('password123')

        ]);
    }
}
