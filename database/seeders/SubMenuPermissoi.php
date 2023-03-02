<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SubMenuPermissoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'submenu-list']);
        Permission::create(['name' => 'submenu-create']);
        Permission::create(['name' => 'submenu-edit']);
        Permission::create(['name' => 'submenu-delete']);
        Permission::create(['name' => 'submenu-tab-show']);
    }
}
