<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

            // cusomer order
            'customer.order',

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
            'user.list',
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

            //admin
              'admin.view',

            //supplier
            'supplier.view',

             //manufacturer
             'manufacturer.view',

              //distributor
            'distributor.view',

             //retailer
             'retailer.view',

        ];

      for( $i=0 ; $i< count($permissions); $i++)
      {

        $permission = Permission::create(['name' => $permissions[$i]]);
        $roleAdmin->givePermissionTo($permission);
        $permission->assignRole($roleAdmin);
        $permission->assignRole($roleSupplier);
        $permission->assignRole($roleManufacturer);
        $permission->assignRole($roleDistributor);
        $permission->assignRole($roleRetailer);
      }

      $admin = User::find(1); 
      $supplier = User::find(2); 
      $manufacturer = User::find(3); 
      $distributor = User::find(4); 
      $retailer = User::find(5); 

      $admin->assignRole('Admin');
      $supplier->assignRole('Supplier');
      $manufacturer->assignRole('Manufacturer');
      $distributor->assignRole('Distributor');
      $retailer->assignRole('Retailer');

      
    }
}
