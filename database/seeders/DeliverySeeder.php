<?php

namespace Database\Seeders;

use App\Models\Delivery1;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Delivery1::create([
            'user_name' => 'Shahriair Lemon',
            'email' => 'shahriairlemon@gmail.com',
            'phone' => '017453655336',
            'password' => bcrypt('123456'),
        ]);
    }
}
