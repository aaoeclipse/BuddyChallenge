<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ChallengeUser extends Pivot
{
    protected $fillable = [
        'user_id',
        'challenge_id',
        'points',
        'accepted',
    ];
}
