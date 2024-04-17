<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
	use HasFactory;

	protected $table = 'sales';
	protected $fillable = [
		'sales_title',
		'sales_desc',
		'sales_alias',
		'sales_img',
        'sales_seo_title',
        'sales_seo_another',
        'sales_seo_description',
        'sales_seo_key'

	];
}
