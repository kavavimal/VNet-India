<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;

    protected $table = "plan_specification_tbl";

    protected $fillable = [
        'spec_name',
        'spec_desc',
        'sub_menu_id',
        'created_at',
        'updated_at'
    ];
}
