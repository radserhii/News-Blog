<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categoryName = ['Politics', 'Economy', 'Science', 'Health', 'Sport', 'World',];
        foreach ($categoryName as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
