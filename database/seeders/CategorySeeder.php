<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => json_encode(['Платные', 'Android'])],
            ['name' => json_encode(['Платные', 'iOS'])],
            ['name' => json_encode(['Бесплатные', 'Android'])],
            ['name' => json_encode(['Бесплатные', 'iOS'])],
            ['name' => json_encode(['Бесплатные', 'Android', 'iOS'])],
            ['name' => json_encode(['Платные', 'Android', 'iOS'])],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}
