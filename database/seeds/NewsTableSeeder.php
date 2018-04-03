<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,50) as $index) {
            DB::table('news')->insert([
                'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'content' => $faker->text($maxNbChars = 200),
                'image' =>$faker->imageUrl($width = 640, $height = 480),
                'category_id' => $faker->numberBetween($min = 1, $max = 6),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
