<?php
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
  
class Category extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'status',
    ];

    //each category might have one parent
    public function parent() {
        return $this->hasOne($this::class, 'id', 'parent_id');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany($this::class, 'parent_id')->orderBy('name', 'asc');
    }
}