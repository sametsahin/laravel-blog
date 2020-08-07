<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Genel', 'Sanat', 'Tarih', 'Teknoloji', 'Sağlık', 'Spor'];
        $faker = Faker::create();
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => str_slug($category),
                'color' => '1',
                'image' => $faker->imageUrl(1595, 270, false, true, 'img'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
