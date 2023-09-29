<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pivotData = [
            ['object_id' => 1, 'category_id' => 1],
            ['object_id' => 2, 'category_id' => 2],
            ['object_id' => 3, 'category_id' => 2],
            ['object_id' => 4, 'category_id' => 5],
            ['object_id' => 5, 'category_id' => 4],
            ['object_id' => 6, 'category_id' => 6],
            ['object_id' => 7, 'category_id' => 1],
            ['object_id' => 4, 'category_id' => 2],
            // Add more pivot data as needed
        ];

        // Insert the pivot data into the object_category table
        DB::table('object_category')->insert($pivotData);
    }
}
