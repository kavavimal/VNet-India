<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedCategory extends Model
{
    use HasFactory;

    protected $table = "plan_featured_category_tbl";

    protected $fillable = [
        'featured_cat_name',
        'show_status',
        'featured_cat_desc',
        'sub_menu_id',
        'sys_state',
        'created_at',
        'updated_at'
    ];

    //each category might have multiple children
    public function children() {
        return $this->hasMany(FeaturedSubCategory::class, 'featured_id')->where('sys_state','!=','-1')->orderBy('name', 'asc');
    }
}
