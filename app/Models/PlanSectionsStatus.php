<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanSectionsStatus extends Model
{
    use HasFactory;
    protected $table = "plan__sections_statuses";

    protected $fillable = [
        'section_name',
        'status',
        'sys_state',
        'created_at',
        'updated_at'
    ];   
    public function getPlanSectionsStatus(){
        $sections = $this->get();
        $data = [];
        foreach ($sections as $section) {
            $data[] = [$section->section_name, $section->status];
        }
        return $data;
    }
}
