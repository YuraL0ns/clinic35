<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Point extends Model
{
    use HasFactory;
    protected $table = 'points';
    protected $fillable = [
        'point_title',
        'point_price',
        'point_okvd'
    ];

    public function services() : BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'point_service', 'service_id', 'point_id');
    }
}
