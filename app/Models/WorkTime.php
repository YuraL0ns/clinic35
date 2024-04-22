<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{

    protected $fillable = ['doctor_id', 'work_time'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
