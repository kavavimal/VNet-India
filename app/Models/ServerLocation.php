<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerLocation extends Model
{
    use HasFactory;

    protected $table = "plan_server_location_tbl";

    protected $fillable = [
        'base_country',
        'amount',
        'currency',
        'server_location_country',
        'percentage',
        'created_at',
        'updated_at'
    ];
}
