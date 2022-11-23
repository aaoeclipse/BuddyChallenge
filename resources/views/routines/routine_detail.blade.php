@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <ul class="card">
                <h1>Routines</h1>
                <li>
                    <span>workout_id: {{ $routine->workout_id }}</span>
                    <span>user_id: {{ $routine->user_id }}</span>
                    <span>challenge_id: {{ $routine->challenge_id }}</span>
                    <span>day_of_week: {{ $routine->day_of_week }}</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
