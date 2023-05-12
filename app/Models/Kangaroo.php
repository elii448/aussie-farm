<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kangaroo extends Model
{
    protected $table = 't_kangaroo';

    protected $fillable = [
        'name',
        'nickname',
        'weight',
        'height',
        'gender',
        'color',
        'friendliness',
        'birthday',
        'is_deleted'
    ];

    protected $casts = [
        'birthday' => 'date',
    ];
}
