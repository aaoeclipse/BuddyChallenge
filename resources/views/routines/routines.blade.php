@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <ul class="card">
                <h1>Rotuine</h1>
                @foreach ($routines as $routine)
                    <li>
                        <span>id: {{ $routine->id }}</span>
                        <span>challenge: {{ $routine->challenge_id }}</span>
                        <span>day_of_week: {{ $routine->day_of_week }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
