<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ProductPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'product-list']);
        Permission::create(['name' => 'product-create']);
        Permission::create(['name' => 'product-edit']);
        Permission::create(['name' => 'product-delete']);
        Permission::create(['name' => 'product-tab-show']);
    }
}
