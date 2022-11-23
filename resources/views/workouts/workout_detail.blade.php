@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <ul class="card">
                <li>
                    <span>id: {{ $workout->id }}</span>
                    <h1>{{ $workout->name }}</h1>
                    <p>sets: {{ $workout->num_set }}</p>
                    <span>repetition: {{ $workout->repetitions }}</span>
                    <span>type: {{ $workout->type }}</span>
                    <span>owner : {{ $workout->owner_id }}</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
