@extends('layouts.app')
@section('content')
    <div class="flex w-screen justify-center">
        <form method="PUT" action={{ route('challenge.edit', $challenge->id) }} class="flex flex-col w-[80%] gap-2">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required placeholder="{{ $challenge->title }}">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="10" rows="2" placeholder="{{ $challenge->description }}"></textarea>
            <label>Starting date:</label>
            <input type="date" name="starting_date" id="starting_date" placeholder="{{ $challenge->starting_date }}"
                required>
            <label for="ending_date">Ending date</label>
            <input type="date" name="ending_date" id="ending_date" placeholder="{{ $challenge->ending_date }}" required>
            <button type="submit" class="text-xl font-bold bg-blue-700 p-2 text-white rounded mt-4">+ Challenge</button>
        </form>
    </div>
    <div class="flex w-full justify-center">
        <a href="{{ route('inviting_friends', ['id' => $challenge->id]) }}"
            class="text-xl font-bold bg-green-700 p-2 text-white rounded mt-4">+ Friends</a>

    </div>
@endsection
