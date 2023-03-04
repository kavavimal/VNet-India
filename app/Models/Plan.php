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
        'billing_cycles',
        'plan_pricingids',
        'taxation',
        'specification',
        'featured_category',
        'featured_sub_category',
        'negotiation_min',
        'negotiation_max',
        'negotiation_status',
        'service_type_type',
        'service_type_price',
        'servive_type_currency',
        'service_type_renewal_price',
        'service_type_discount',
        'sys_state',
        'created_at',
        'updated_at'
    ];

    public function submenu(){
        return $this->hasOne(SubMenu::class,'id','plan_product_id');
    }

     //each plan might have multiple plan pricing
     public function planPricing() {
        return $this->hasMany(PlanPricing::class, 'plan_id')->where('sys_state','!=','-1');
    }

    public function getBillingCyclesAttributes()
    {
        $billingcyclesids = $this->getOriginal('billing_cycles');
        return BilingCycle::whereIn('id', explode(',', $billingcyclesids))->get();
    }

    public function getSpecificationsAttributes()
    {
        $specificationids = $this->getOriginal('specification');
        return Specification::whereIn('id', explode(',', $specificationids))->get();
    }
    
    public function getFeaturedCategorysAttributes()
    {
        $featuredCategoryids = $this->getOriginal('featured_category');
        return FeaturedCategory::whereIn('id', explode(',', $featuredCategoryids))->get();
    }
    
    public function getFeaturedSubCategorysAttributes()
    {
        $featuredSubCategoryids = $this->getOriginal('featured_sub_category');
        return FeaturedSubCategory::whereIn('id', explode(',', $featuredSubCategoryids))->get();
    }
}
