<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function application(): HasOne
    {
        return $this->hasOne(Application::class);
    }

    public static function closest_dedlines()
    {
        return Position::orderByDesc('deadline_at')->limit(10)->get();
    }
}
