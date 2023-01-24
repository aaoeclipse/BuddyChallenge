<?php

namespace App\Http\Controllers;

use App\Events\ChallengeProcess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InviteFriends extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $challenge_id = $request->id;
        $user = Auth::user();

        // Check if permissions
        $challenge = $user->own_challenges->find($challenge_id);

        return view('challenges/inviting_friends', ['challenge' => $challenge]);
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent());
        // dd($data->emails);
        foreach ($data->emails as $req) {
            $tmp_user = User::where('email', $req->email)->firstOrFail();
            ChallengeProcess::dispatch($data->id, $tmp_user->id, false);
        }

        return redirect()->route('challenge.show', ['challenge' => $data->id]);
    }
}
