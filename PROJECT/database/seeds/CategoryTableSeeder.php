<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecord = [
            [
                'id' => 1, 'name' => 'karkas', 'parent_id' => 1, 'icon' => '', 'icon_web' => '',
                'status' => 1, 'ordering' => 1
            ]
        ];

        Category::insert($categoryRecord);
    }
}