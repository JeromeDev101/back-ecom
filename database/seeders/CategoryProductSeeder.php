<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all product IDs and category IDs
        $productIds = DB::table('products')->pluck('id')->toArray();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        foreach (range(1, 100) as $index) {
            DB::table('category_product')->insert([
                'product_id' => $faker->randomElement($productIds),
                'category_id' => $faker->randomElement($categoryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
