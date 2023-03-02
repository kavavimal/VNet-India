<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilingCycle extends Model
{
    use HasFactory;

    protected $table = "plan_billing_cycle_tbl";

    protected $fillable = [
        'billing_name',
        'billing_desc',
        'sub_menu_id',
        'sys_state',
        'created_at',
        'updated_at'
    ];
}
