<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'vacancy_title',
        'vacancy_alias',
        'vacancy_description',
        'vacancy_images',
        'vacancy_visible',
        'vacancy_price',
        'seo_title',
        'seo_description',
        'seo_key',
    ];
}
