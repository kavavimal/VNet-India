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
        'featured_cat_desc',
        'sys_state',
        'created_at',
        'updated_at'
    ];
}
