<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => bcrypt('user'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'password' => bcrypt('user'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'user3',
            'email' => 'user4@example.com',
            'password' => bcrypt('user'),
            'role' => 'user',
        ]);
    }
}
