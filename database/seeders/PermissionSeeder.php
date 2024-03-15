<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user-create',
            'user-edit',
            'user-delete',
            'user-show',
            'role-create',
            'role-edit',
            'role-delete',
            'role-show',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'permission-show',
            'vehicle-create',
            'vehicle-edit',
            'vehicle-delete',
            'vehicle-show',
            'expenses-create',
            'expenses-edit',
            'expenses-delete',
            'expenses-show',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'customer-show',
            'dealer-create',
            'dealer-edit',
            'dealer-delete',
            'dealer-show',
            'purchase-create',
            'purchaseNew-edit',
            'purchaseNew-delete',
            'purchaseNew-show',
            'purchaseUsed-create',
            'purchaseUsed-edit',
            'purchaseUsed-delete',
            'purchaseUsed-show',
            'saleNew-create',
            'saleNew-edit',
            'saleNew-delete',
            'saleNew-show',
            'saleUsed-create',
            'saleUsed-edit',
            'saleUsed-delete',
            'saleUsed-show',
            'payment-create',
            'payment-edit',
            'payment-show',
            'registrations-create',
            'registrations-edit',
            'registrations-show',
            'report-leadger',
            'report-sale',
            'report-purchase',
            'report-customer',
        ];

        foreach($permissions as $val){
            Permission::create([
                'name'=>$val,
                'guard_name'=>'web'
            ]);
        }
    }
}
