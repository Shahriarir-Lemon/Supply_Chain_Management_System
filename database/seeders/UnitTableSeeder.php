<?php

namespace Database\Seeders;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            $units = [
                [
                    'Unit_Name' => 'KG',
                ],
                [
                    'Unit_Name' => 'Liter',
                ],
                [
                    'Unit_Name' => 'Piece',
                ],
            ];

            
            foreach ($units as $unit) {
                Unit::create($unit);
            }

     }
  }
