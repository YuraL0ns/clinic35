<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\WorkTime;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'doctor_name',
        'doctor_alias',
        'doctor_spec',
        'doctor_exp',
        'doctor_students',
        'doctor_initial',
        'doctor_secondary',
        'doctor_images',
        'doctor_visible',
        'seo_title',
        'seo_description',
        'seo_key',
    ];

    /**
     * @return BelongsToMany
     */
    public function services() : BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'doctor_service', 'service_id', 'doctor_id');
    }

    public function workTimes() : HasMany
    {
        return $this->hasMany(WorkTime::class);
    }

}
