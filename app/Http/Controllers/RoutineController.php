<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutineController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $routines = $user->routines;

        return view('routines/routines', ['routines' => $routines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('routines/create_routine');
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
            'workout_id' => 'required',
            'challenge_id' => 'required',
            'day_of_week' => 'required|integer',
        ]);

        // TODO: Verify that the user has access to both workout and challenge.

        $routine = Routine::create([
            'user_id' => Auth::id(),
            'workout_id' => $request->input('workout_id'),
            'challenge_id' => $request->input('challenge_id'),
            'day_of_week' => $request->input('day_of_week'),
        ]);

        return redirect()->route('routine.show', ['routine' => $routine->id]);
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
        $routine = $user->routines->find($id);

        return view('routines/routine_detail', ['routine' => $routine]);
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
        $request->validate([
            'day_of_week' => 'required|integer',
        ]);

        $routine = Auth::user()->routines->find($id);

        $routine->day_of_week = $request->input('day_of_week');

        $routine->save();

        return redirect()->route('routine.show', ['routine' => $routine->id]);
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
        $routine = $user->routines->find($id);
        if ($routine) {
            $routine->delete();
        }
    }
}
