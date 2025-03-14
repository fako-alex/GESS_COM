<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'adminalex@gmail.com'],
            [
                'name' => 'alex',
                'first_name' => 'Admin',
                'email' => 'adminalex@gmail.com',
                'password' => Hash::make('Cisco1234@'),
                'role' => 'admin',
            ]
        );
    }
}
