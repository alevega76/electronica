<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Alejandro Vega',
            'email' => 'alejandrovega1976@outlook.com',
            'password' => bcrypt('1q2w3e4r5t')
        ])->assignRole('Admin');
    }

}
