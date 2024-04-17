<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageForm extends Model
{
    protected $table = 'message_form';

    protected $fillable = [
        'name',
        'phone',
        'from',
    ];
}
