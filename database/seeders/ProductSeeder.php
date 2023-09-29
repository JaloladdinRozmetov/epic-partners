<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => "Приложение 1"],
            ['name' => "Приложение 2"],
            ['name' => "Приложение 3"],
            ['name' => "Приложение 4"],
            ['name' => "Приложение 5"],
            ['name' => "Приложение 6"],
            ['name' => "Приложение 7"],
        ];

        foreach ($categories as $categoryData) {
            Product::create($categoryData);
        }
    }
}
