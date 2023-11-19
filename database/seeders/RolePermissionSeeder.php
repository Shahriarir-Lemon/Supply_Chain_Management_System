<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleSupplier = Role::create(['name' => 'Supplier']);
        $roleManufacturer = Role::create(['name' => 'Manufacturer']);
        $roleDistributor = Role::create(['name' => 'Distributor']);
        $roleRetailer = Role::create(['name' => 'Retailer']);



        $permissions = [

            //Admin Permission
            'dashboard.view',

            //Raw Materials
            'add.materials',
            'view.material',
            'edit.material',
            'delete.material',

            // Priducts 
            'add.product',
            'view.product',
            'edit.product',
            'delete.product',


            // Manage Category

            'add.category',
            'edit.category',
            'delete.category',

            // Manage Units

            'add.unit',
            'edit.unit',
            'delete.unit',

            // Users
            'add.user',
            'delete.user',

            // invoice
            'material.invoice',
            'product.invoice',
            'customer.invoice',

            //Payment

            'manufacturer.payment',
            'retailer.payment',
            'customer.payment',


            //notification

            'material.notification',
            'product.notification',
            'retailer.notification',

        ];

      for( $i=0 ; $i< count($permissions); $i++)
      {

        $permission = Permission::create(['name' => $permissions[$i]]);
        $roleAdmin->givePermissionTo($permission);
        $permission->assignRole($roleAdmin);
      }




    }
}
