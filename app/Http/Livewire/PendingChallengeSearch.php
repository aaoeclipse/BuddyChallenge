<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PendingChallengeSearch extends Component
{
    public $challenges = '';

    public function render()
    {
        $user = auth()->user();
        $this->challenges = $user->workouts;
        $this->challenges->filter(function ($challenge) {
            return !$challenge->pivot->accepted;
        })->values();

        return view('livewire.pending-challenge-search');
    }
}
