<?php

namespace Database\Seeders;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            
            'c_fullname'=>'Shahriair Lemon',
            'c_username'=>'lemona',
            'c_email'=>'shahriairlemon@gmail.com',
            'password'=>bcrypt('123456'),
            'email_verified'=>1,
            'email_verified_at'=>\Carbon\Carbon::now(),
            'code'=>'',
            
        ]);
    }
}

