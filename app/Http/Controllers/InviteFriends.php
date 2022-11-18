<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InviteFriends extends Controller
{
    public function index(Request $request)
    {
        $challenge_id = $request->id;

        return view('challenges/inviting_friends', ['id' => $challenge_id]);
    }
}
