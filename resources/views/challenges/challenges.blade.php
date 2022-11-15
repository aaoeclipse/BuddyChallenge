@foreach ($challenges as $challenge)
    <div>
        <span>id: {{ $challenge->id }}</span>
        <h1>{{ $challenge->tilte }}</h1>
        <p>{{ $challenge->description }}</p>
        <span>{{ $challenge->owner_id }}</span>
        <span>Starting: {{ $challenge->starting_date }}</span>
        <span>Ending: {{ $challenge->ending_date }}</span>
    </div>
@endforeach
