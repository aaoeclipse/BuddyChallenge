@extends('layouts.app')

@section('content')
    <div class="container flex flex-col justify-center items-center">
        <h1 class="font-bold text-3xl ">Invite your friends!</h1>
        <h2 class="font-semibold text-xl text-gray-500 mb-10">{{ $challenge->id }} - {{ $challenge->title }}</h2>
        <form method="POST" action={{ route('inviting_friends.store') }}>
            @csrf
            <invite-friends></invite-friends>
        </form>


    </div>
@endsection
