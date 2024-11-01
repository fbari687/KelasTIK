<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Review::create(
                [
                    'user_id' => rand(5, 7),
                    'course_id' => rand(1, 3),
                    'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam odio eius molestias, ipsam nostrum libero?'
                ]
            );
        }
    }
}
