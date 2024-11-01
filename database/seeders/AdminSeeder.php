<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => "admin",
            'email' => "admin@pnj.ac.id",
            'nim' => "999999999",
            'bio' => "admin",
            'password' => bcrypt('admin1234'),
            'prodi' => 'other',
            'semester' => 0,
            'image' => '/profile/default-profile.webp'
        ]);
    }
}
