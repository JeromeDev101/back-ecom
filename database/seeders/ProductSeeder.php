<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('products')->insert([
                'name' => $faker->word,
                'code' => $faker->ean13(),
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 1000),
                'quantity' => $faker->numberBetween(1, 100),
                'image_path' => $faker->imageUrl(640, 480, 'technics'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
