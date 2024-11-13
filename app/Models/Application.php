<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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


    public function position() : BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public static function closest_interviews()
    {
        $out = [];
        $applications = Application::whereNotNull('interview_at')->orderByDesc('interview_at')->limit(10)->get();
        foreach ($applications as $application) {
            $out[]=$application->position;
        }
        return $out;
    }
}
