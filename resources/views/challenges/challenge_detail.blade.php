@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card flex flex-col justify-center items-center gap-3">
            <h1 class="text-3xl mt-10">{{ $challenge->title }}</h1>
            <p class="text-xl w-[75%]">{{ $challenge->description }}</p>
            <span class="text-gray-500">Date: {{ $challenge->starting_date }} || {{ $challenge->ending_date }}</span>
            <div class="flex w-full outline my-10"></div>
            <h1 class="text-3xl pb-5">Participating</h1>

            @foreach ($challenge->users as $user)
                <div
                    class="flex flex-col 
            rounded bg-slate-100 w-[50%] justify-center items-center
            gap-2 mb-5 py-3 shadow-md">
                    <span class="text-2xl">{{ $user->name }}</span>
                    <span class="text-md">{{ $user->email }}</span>
                </div>
            @endforeach
            <div class="flex w-full outline my-10"></div>
            <h1 class="text-3xl pb-5">No routines yet</h1>
            <div
                class="flex flex-col 
    rounded bg-slate-100 w-[50%] justify-center items-center
    gap-2 mb-5 py-3 shadow-md cursor-pointer select-none hover:bg-slate-200 active:bg-slate-300">
                <a href="{{ route('routine.create') }}" class="text-2xl">+ Routine</a>
            </div>
        </div>
    </div>
    </div>
@endsection
