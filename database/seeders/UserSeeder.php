<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Leman',
                'surname' => 'Amrahova',
                'email' => 'leman@gmail.com',
                'password' => '123',
                'image' => 'user.png',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
