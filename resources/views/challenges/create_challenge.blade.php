@extends('layouts.app')


@section('content')
    <div class="flex w-screen justify-center">
        <form method="POST" action={{ route('challenge.store') }} class="flex flex-col w-[80%] gap-2">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required placeholder="title">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="10" rows="2"></textarea>
            <label>Starting date:</label>
            <input type="date" name="starting_date" id="starting_date" required>
            <label for="ending_date">Ending date</label>
            <input type="date" name="ending_date" id="ending_date" required>
            <button type="submit" class="text-xl font-bold bg-blue-700 p-2 text-white rounded mt-4">+ Challenge</button>
        </form>
    </div>
@endsection
