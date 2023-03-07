<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenSpecification extends Model
{
    use HasFactory;

    protected $table = "menu_specifications_tbl";

    protected $fillable = [     
        'id',
        'plan_product_id',
        'billing_cycles',
        'specification',
        'featured_category',
        'featured_sub_category',
        'plan_pricing',
        'taxation',
        'negotiation_min',
        'negotiation_max',
        'negotiation_status',
        'service_type_type',
        'service_type_price',
        'servive_type_currency',
        'service_type_renewal_price',
        'service_type_discount',
        'plan_pricingids',
        'sys_state',
        'created_at',
        'updated_at'
    ];

    public function submenu(){
        return $this->hasOne(SubMenu::class,'id','plan_product_id');
    }

}
