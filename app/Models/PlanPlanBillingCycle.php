<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPlanBillingCycle extends Model
{
    use HasFactory;

    protected $table = "plan_plan_billing_cycle";

    protected $fillable = [
        'plan_billing_name',
        'sys_state',
        'created_at',
        'updated_at'
    ];
}
