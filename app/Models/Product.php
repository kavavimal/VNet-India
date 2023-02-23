<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "product__rec_tbl";

    protected $fillable = [
        'product_name',
        'product_desc',
        'category_id',
        'created_at',
        'updated_at'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}