<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'title',
        'organazaion',
        'location',
        'apply_link',
        'email',
        'deadline_at',
    ];
}
