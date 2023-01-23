@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-16 flex flex-col gap-4">
            <div class="card">
                <div class="card-body">
                    <pending-challenges></pending-challenges>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <x-own-components title="Current Challenges" :challenges='$user->challenges' admin='false'></x-own-components>
                </div>
            </div>
            <div class="card">
                <div class="card-body flex flex-col">
                    <x-own-components title="Own Challenges" :challenges='$user->own_challenges' admin='true'></x-own-components>
                    <a href="{{ route('challenge.create') }}" class="btn btn-primary mt-3">+
                        Challenge </a>
                </div>
            </div>
            <div class="flex flex-col md:flex-row bg-orange-800  md:w-[80%] rounded overflow-hidden self-center">
                <img class="" src="https://placebear.com/g/200/300" alt="bear">
                <div class="text-xl text-white flex flex-col items-center justify-center">
                    <p class="m-4">{{$quote['q']}}</p>
                    <span class="font-serif">{{$quote['a']}}</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection