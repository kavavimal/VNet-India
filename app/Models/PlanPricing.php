<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPricing extends Model
{
    use HasFactory;
    protected $table = "plan__pricing_tbl";

    protected $fillable = [
        'plan_id',
        'storage',
        'storage_price',
        'billing_cycle',
        'server',
        'window_server',
        'price',
        'sys_state',
        'created_at',
        'updated_at'
    ];

    public function plan(){
        return $this->hasOne(Plan::class,'id','plan_id');
    }
}
