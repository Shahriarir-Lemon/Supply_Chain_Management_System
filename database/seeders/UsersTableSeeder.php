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
        User::create([
            
            'user_name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456'),
            
        ]);
    }
}
