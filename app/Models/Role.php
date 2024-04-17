<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = ['role_name', 'role_color', 'role_icon', 'role_exp'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
