<?php

namespace App\Http\Controllers;

use App\Events\ChallengeProcess;
use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('challenges/challenges', ['challenges' => $user->own_challenges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('challenges/create_challenge');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:255',
            'description' => 'required|min:5|max:1024',
            'starting_date' => 'required',
            'ending_date' => 'required',
        ]);

        $challenge = Challenge::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'starting_date' => $request->input('starting_date'),
            'ending_date' => $request->input('ending_date'),
            'owner_id' => Auth::id(),
        ]);

        // The owner must also have to be in the pivot table
        ChallengeProcess::dispatch($challenge->id, Auth::id(), true);

        return redirect()->route('inviting_friends', ['id' => $challenge->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $challenge = $user->own_challenges->find($id);

        return view('challenges/challenge_detail', ['challenge' => $challenge]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $challenge = $user->own_challenges->find($id);

        return view('challenges/challenge_detail', ['challenge' => $challenge]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:255',
            'description' => 'required|min:5|max:1024',
            'starting_date' => 'required',
            'ending_date' => 'required',
        ]);

        $challenge = Auth::user()->own_challenges->find($id);

        $challenge->title = $request->input('title');
        $challenge->description = $request->input('description');
        $challenge->starting_date = $request->input('starting_date');
        $challenge->ending_date = $request->input('ending_date');

        $challenge->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $challenge = $user->own_challenges->find($id);

        if ($challenge) {
            $challenge->delete();
        }

        return redirect()->route('home')->with('success', 'Challege deleted successfully');
    }
}
