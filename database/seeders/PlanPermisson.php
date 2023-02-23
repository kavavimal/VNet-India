<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PlanPermisson extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'plan-list']);
        Permission::create(['name' => 'plan-create']);
        Permission::create(['name' => 'plan-edit']);
        Permission::create(['name' => 'plan-delete']);
        Permission::create(['name' => 'plan-tab-show']);
    }
}
