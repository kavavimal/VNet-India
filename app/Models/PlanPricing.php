<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPricing extends Model
{
    use HasFactory;
    protected $table = "plan_pricing_rec_tbl";

    protected $fillable = [
        'storage',
        'storage_price',
        'billing_cycle',
        'server',
        'window_server',
        'upgrade_downgrade',
        'price',
        'sys_state',
        'created_at',
        'updated_at'
    ];    
}
