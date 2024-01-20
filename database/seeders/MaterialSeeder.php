<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = [
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Material 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Caegory 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Material 2',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Caegory 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Material 3',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Caegory 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Material 4',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Caegory 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Material 5',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Caegory 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Material 6',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Caegory 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Material 7',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Caegory 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Material 8',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Caegory 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Material 9',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Caegory 1',
            ],
            ['Material_Image' => '/storage/material/p.png',
            'Material_Name' => 'Material 10',
            'Price' => '20.99',
            'Unit_Type' => 'KG',
            'Stock' => '50',
            'Description' => 'Description for Caegory 1',
            ],
            
        ];

        foreach ($materials as $material) {
          
           // $category = Category::firstOrCreate(['Category_Name' => $data['Category']]);

           
            Material::create([
                'Material_Image' => $material['Material_Image'],
                'Material_Name' => $material['Material_Name'],
                'Price' => $material['Price'],
                'Unit_Type' => $material['Unit_Type'],
                'Stock' => $material['Stock'],
                'Description' => $material['Description'],
            ]);
        }
    }
}
