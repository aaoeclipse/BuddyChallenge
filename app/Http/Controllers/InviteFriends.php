<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InviteFriends extends Controller
{
    public function index(Request $request)
    {
        $challenge_id = $request->id;
        $user = Auth::user();

        // Check if permissions
        $challenge = $user->own_challenges->find($challenge_id);

        return view('challenges/inviting_friends', ['challenge' => $challenge]);
    }
}
