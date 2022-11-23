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
    public function __construct(int $challenge_id, int $user_id, bool $accepted)
    {
        ChallengeUser::create([
            'user_id' => $user_id,
            'challenge_id' => $challenge_id,
            'accepted' => $accepted, // must be true since if he created the challenge
        ]);
    }
}
