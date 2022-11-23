<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ChallengeUser extends Pivot
{
    use HasFactory;

    // public $timestamps = false;

    protected $fillable = [
        'user_id',
        'challenge_id',
        'points',
        'accepted',
    ];
}
