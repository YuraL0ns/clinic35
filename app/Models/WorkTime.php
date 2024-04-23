<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkTime extends Model
{

    protected $fillable = ['doctor_id', 'work_time'];

    public function doctor() : BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
