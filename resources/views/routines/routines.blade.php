@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <ul class="card">
                <h1>Rotuine</h1>
                @foreach ($routines as $routine)
                    <li>
                        <span>id: {{ $routine->id }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
