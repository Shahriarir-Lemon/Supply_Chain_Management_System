<?php

namespace Database\Seeders;
use Carbon\Factory;
use App\Models\User;
use Database\Factories;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [
                'Category_Name' => 'Bread',
            ],
            [
                'Category_Name' => 'Cakes',
            ],
            [
                'Category_Name' => 'Bun',
            ],

            [
                'Category_Name' => 'Pastries',
            ],
            [
                'Category_Name' => 'Biscuits',
            ],
            [
                'Category_Name' => 'Cookies',
            ],
            [
                'Category_Name' => 'Doughnuts',
            ],
            [
                'Category_Name' => 'Crackers',
            ],
        ];

        
        foreach ($categories as $category) {
            Category::create($category);
        }
       
       
    }
}
