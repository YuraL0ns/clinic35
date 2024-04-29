<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = ['page_title', 'page_alias', 'page_description'];

    public function getFiles()
    {
        return $this->belongsToMany(File::class, 'page_file', 'page_id', 'file_id');
    }
}
