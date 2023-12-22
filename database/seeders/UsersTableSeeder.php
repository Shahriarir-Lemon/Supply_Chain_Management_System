<?php

namespace Database\Seeders;
use Database\Factories;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'user_name' => 'Admin',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('111111'),
                'Role' => 'Admin'
            ],
            [
                'user_name' => 'Supplier',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('111111'),
                'Role' => 'Supplier'
            ],
            [
                'user_name' => 'Manufacturer',
                'email' => 'admin3@gmail.com',
                'password' => bcrypt('111111'),
                'Role' => 'Manufacturer'
            ],
            [
                'user_name' => 'Distributor',
                'email' => 'admin4@gmail.com',
                'password' => bcrypt('111111'),
                'Role' => 'Distributor'
            ],
            [
                'user_name' => 'Retailer',
                'email' => 'admin5@gmail.com',
                'password' => bcrypt('111111'),
                'Role' => 'Retailer'
            ],
          
        ];

            foreach ($usersData as $userData) 
            {
                User::create($userData);
            }
}
}
