<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 4; $i++) {
            $title = $faker->sentence(6);
            DB::table('articles')->insert([
                'category_id' => rand(1, 6),
                'title' => $title,
                'image' => $faker->imageUrl(800, 400, false, true, 'img'),
                'description' => $faker->paragraph(6),
                'slug' => str_slug($title),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => now()
            ]);
        }
    }
}
