<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;
use App\Models\Owner;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Pet::truncate();
        User::truncate();
        Owner::truncate();
        // User::truncate();

        $this->call(PetSeeder::class);
        $this->call(OwnerSeeder::class);
        $this->call(UserSeeder::class);
    }
}
