<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Course::insert([
        //     [
        //         'title' => 'HTML Dasar: Pendahuluan',
        //         'sub_title' => 'Pendahuluan Mengenai HTML',
        //         'slug' => 'html-dasar-pendahuluan',
        //         'description' => $faker->paragraphs(3, true),
        //         'category_id' => 1,
        //         'level' => 1,

        //     ],
        // ]);
    }
}
