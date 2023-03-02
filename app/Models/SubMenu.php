<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    protected $table = "submenu__rec_tbl";

    protected $fillable = [
        'submenu_name',
        'submenu_desc',
        'category_id',
        'created_at',
        'updated_at'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}