<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Razdel extends Model
{
    use HasFactory;

    protected $table = 'razdels';
    protected $fillable = ['razdel_title', 'razdel_alias', 'razdel_images'];


    public $timestamps = false;

    public function services() : BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }
}
