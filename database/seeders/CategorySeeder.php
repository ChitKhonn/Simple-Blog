<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["World News","Local News","Food","Sports","Travel"];
        $arr = [];
        foreach ($categories as $category) {
           $arr []= [
            'title' => $category,
            'user_id' => rand(1,10),
            'created_at' => now(),
            'updated_at' => now()
           ];
        }
        Category::insert($arr);
    }
}
