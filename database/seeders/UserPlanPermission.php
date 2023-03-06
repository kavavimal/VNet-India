<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserPlanPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'user-plan-list']);
        Permission::create(['name' => 'user-plan-create']);
        Permission::create(['name' => 'user-plan-edit']);
        Permission::create(['name' => 'user-plan-delete']);
        Permission::create(['name' => 'user-plan-tab-show']);
    }
}
