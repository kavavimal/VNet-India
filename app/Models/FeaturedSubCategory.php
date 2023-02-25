<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedSubCategory extends Model
{
    use HasFactory;

    protected $table = "plan_featured_sub_category_tbl";

    protected $fillable = [
        'featured_id',
        'name',
        'desc',
        'sys_state',
        'created_at',
        'updated_at'
    ];

    public function parent(){
        return $this->hasOne(FeaturedCategory::class,'id','featured_id');
    }
}
