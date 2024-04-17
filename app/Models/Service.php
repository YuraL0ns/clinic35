<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'razdel_id',
        'service_title',
        'service_alias',
        'service_title_description',
        'service_description',
        'service_many_description',
        'service_images',
        'service_seo_another',
        'service_seo_description',
        'service_seo_key',
        'services_seo_title',

    ];

    public function razdel() : BelongsTo
    {
        return $this->belongsTo(Razdel::class);
    }

    /**
     * @return BelongsToMany
     */
    public function doctors() : BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }
    public function points() : BelongsToMany
    {
        return $this->belongsToMany(Point::class);
    }
}
