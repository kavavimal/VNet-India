<?php

namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PlanSectionsStatus;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class PlanSectionsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanSectionsStatus::create([
            'section_name' => 'section_specification', 
            'status' => 1,
        ]);
        PlanSectionsStatus::create([
            'section_name' => 'section_featured_cat', 
            'status' => 1,
        ]);
        PlanSectionsStatus::create([
            'section_name' => 'section_server_location', 
            'status' => 1,
        ]);
        PlanSectionsStatus::create([
            'section_name' => 'section_taxation', 
            'status' => 1,
        ]);
        PlanSectionsStatus::create([
            'section_name' => 'section_nagotiation', 
            'status' => 1,
        ]);
    }
}
