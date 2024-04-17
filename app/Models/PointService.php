<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointService extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'point_service';
    protected $fillable = ['point_id', 'service_id'];
}
