<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('workouts/workouts', ['workouts' => $user->workouts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'num_set' => 'required|integer|min:0',
            'repetitions' => 'required|integer|min:0',
            'type' => 'required',
        ]);

        $workout = Workout::create([
            'name' => $request->input('name'),
            'num_set' => $request->input('num_set'),
            'repetitions' => $request->input('repetitions'),
            'type' => $request->input('type'),
            'owner_id' => Auth::id(),
        ]);

        return redirect()->route('workout.show', ['workout' => $workout->id]);
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
        $workout = $user->workouts->find($id);

        view('workouts/workout_detail', ['workout' => $workout]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'num_set' => 'required|integer|min:0',
            'repetitions' => 'required|integer|min:0',
            'type' => 'required',
        ]);

        $workout = Auth::user()->workouts->find($id);

        $workout->name = $request->input('name');
        $workout->num_set = $request->input('num_set');
        $workout->repetitions = $request->input('repetitions');
        $workout->type = $request->input('type');

        $workout->save();
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
        $challenge = $user->workouts->find($id);
        if ($challenge) {
            $challenge->delete();
        }
    }
}
