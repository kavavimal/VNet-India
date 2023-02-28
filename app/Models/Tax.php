<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $table = "plan_tax_tbl";

    protected $fillable = [
        'tax_name',
        'tax_percentage',
        'sys_state',
        'created_at',
        'updated_at'
    ];
}
