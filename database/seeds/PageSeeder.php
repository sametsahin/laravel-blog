<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ['Hakkımızda', 'Kariyer'];
        $count= 0;
        $faker = Faker::create();
        foreach ($pages as $page) {
            $count++;
            DB::table('pages')->insert([
                'title' => $page,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore dolores, dolorum explicabo inventore magnam neque quis sed! Ad culpa hic id impedit ipsum nulla optio possimus sapiente ut voluptatibus! Earum.',
                'slug' => str_slug($page),
                'image' => $faker->imageUrl(1595, 270, false, true, 'img'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
