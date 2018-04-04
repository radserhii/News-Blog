<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsTagsRefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 500) as $number) {
            DB::table('news_tags_ref')->insert([
                'news_id' => $faker->numberBetween($min = 1, $max = 200),
                'tag_id' => $faker->numberBetween($min = 1, $max = 10),
            ]);
        }
    }
}
