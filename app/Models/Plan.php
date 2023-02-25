<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    
    protected $table = "plan__rec_tbl";

    protected $fillable = [
        'plan_name',
        'plan_product_id',
        'sys_state',
        'created_at',
        'updated_at'
    ];

    public function product(){
        return $this->hasOne(Product::class,'id','plan_product_id');
    }
}
