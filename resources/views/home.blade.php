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
            <div class="relative">
                <img class="" src="https://placebear.com/g/200/300" alt="bear">
                <div class="absolute top-0 left-0 text-xl text-white font-mono font-extrabold w-full h-full ">
                    <p class="">{{$quote['q']}}</p>
                    <span class="font-serif">{{$quote['a']}}</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection