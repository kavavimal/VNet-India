<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminUserSeeder::class,
            ContactCountrySeeder::class,
            PlanPermisson::class,
            PlanSectionsStatusSeeder::class,
            ProductPermission::class,
            SubMenuPermissoi::class,
            UserPlanPermission::class,
        ]);
    }
}
