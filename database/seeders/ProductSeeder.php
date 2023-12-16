<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\File;
use App\Models\Material;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $imageData = [
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Product 2',
                'Price' => '29.99',
                'Unit_Type' => 'Piece',
                'Stock' => '30',
                'Description' => 'Description for Product 2',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Product 2',
                'Price' => '29.99',
                'Unit_Type' => 'Piece',
                'Stock' => '30',
                'Description' => 'Description for Product 2',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Product 2',
                'Price' => '29.99',
                'Unit_Type' => 'Piece',
                'Stock' => '30',
                'Description' => 'Description for Product 2',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Product 2',
                'Price' => '29.99',
                'Unit_Type' => 'Piece',
                'Stock' => '30',
                'Description' => 'Description for Product 2',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
            ],
            [
                'Material_Image' => '/storage/material/p.png',
                'Material_Name' => 'Product 2',
                'Price' => '29.99',
                'Unit_Type' => 'Piece',
                'Stock' => '30',
                'Description' => 'Description for Product 2',
            ],
            
        ];

        foreach ($imageData as $data) 
        {
            
            Material::create([
                'Material_Image' => $data['Material_Image'],
                'Material_Name' => $data['Material_Name'],
                'Price' => $data['Price'],
                'Unit_Type' => $data['Unit_Type'],
                'Stock' => $data['Stock'],
                'Description' => $data['Description'],
            ]);
        }
    }
}