<?php

namespace App\Events;

use App\Models\Challenge;
use App\Models\ChallengeUser;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChallengeProcess
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Challenge $challenge, int $user_id)
    {
        ChallengeUser::create([
            'user_id' => $user_id,
            'challenge_id' => $challenge->id,
            'accepted' => true, // must be true since he created the challenge
        ]);
    }
}
