<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'applied_at',
        'interview_at',
        'sop',
        'motivation_letter',
        'cv',
        'tr_bachelor',
        'tr_master',
        'tr_phd',
        'crt_bachelor',
        'crt_master',
        'crt_phd',
        'custom_form',
        'refrence_letter',
        'additional_info',
        'user_id',
        'position_id',
    ];

















}
