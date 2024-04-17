<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class DoctorService extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'doctor_service';
    protected $fillable = ['doctor_id', 'service_id'];
}
