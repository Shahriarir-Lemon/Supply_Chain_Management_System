<?php

namespace Database\Seeders;

use App\Models\Category;
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
       // $category = Category::all();
        $products = [
            [
                'Product_Image' => '/storage/material/a.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Manufacturer',
            ],
            [
                'Product_Image' => '/storage/material/b.jpg',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Manufacturer',
            ],
            [
                'Product_Image' => '/storage/material/c.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Manufacturer',
            ],
            [
                'Product_Image' => '/storage/material/d.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Manufacturer',
            ],
            [
                'Product_Image' => '/storage/material/e.jpg',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Manufacturer',
            ],
            [
                'Product_Image' => '/storage/material/g.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Distributor',
            ],
            [
                'Product_Image' => '/storage/material/p.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Distributor',
            ],
            [
                'Product_Image' => '/storage/material/g.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Distributor',
            ],
            [
                'Product_Image' => '/storage/material/c.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Distributor',
            ],
            [
                'Product_Image' => '/storage/material/i.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Distributor',
            ],
            [
                'Product_Image' => '/storage/material/h.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Retailer',
              ],
              [
                'Product_Image' => '/storage/material/i.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Retailer',
              ],
              [
                'Product_Image' => '/storage/material/h.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Retailer',
              ],
              [
                'Product_Image' => '/storage/material/g.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Retailer',
              ],
              [
                'Product_Image' => '/storage/material/i.png',
                'Product_Name' => 'Product 1',
                'Price' => '20.99',
                'Unit_Type' => 'KG',
                'Category'=> 'Cakes',
                'category_id' => '1',
                'Stock' => '50',
                'Description' => 'Description for Product 1',
                'upload' => 'Retailer',
              ],
            
        ];

        foreach ($products as $product) {
          
           // $category = Category::firstOrCreate(['Category_Name' => $data['Category']]);

            // Create the product with the correct category_id
            Product::create([
                'Product_Image' => $product['Product_Image'],
                'Product_Name' => $product['Product_Name'],
                'Price' => $product['Price'],
                'Unit_Type' => $product['Unit_Type'],
                'category_id' => $product['category_id'],
                'Category'=>$product['Category'], // Assign the category ID
                'Stock' => $product['Stock'],
                'Description' => $product['Description'],
                'upload' => $product['upload'],
            ]);
        }
    }
}