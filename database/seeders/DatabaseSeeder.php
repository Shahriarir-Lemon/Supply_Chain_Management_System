<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Delivery1;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(MaterialSeeder::class);
        $this->call(DeliverySeeder::class);
        $this->call(Delivery1Seeder::class);

    }
}
