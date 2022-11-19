@extends('layouts.app')

@section('content')
    <div class="container flex flex-col justify-center items-center">
        <h1 class="font-bold text-3xl ">Invite your friends!</h1>
        <h2 class="font-semibold text-xl text-gray-500 mb-10">{{ $challenge->id }} - {{ $challenge->title }}</h2>
        <div
            class="bg-gray-200 flex gap-10 items-center justify-center px-8 h-12 rounded text-xl
        hover:bg-gray-300 cursor-pointer active:bg-gray-400 active:shadow-inner active:drop-shadow-md select-none">
            <div class="text-gray-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                </svg>
            </div>
            <div class="flex gap-4">
                <span>Add Friend</span>
                <span>+</span>
            </div>
        </div>
    </div>
@endsection
