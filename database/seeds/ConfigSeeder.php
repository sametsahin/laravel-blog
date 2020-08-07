<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        DB::table('configs')->insert([
            'title' => 'Blog Sitesi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

}
