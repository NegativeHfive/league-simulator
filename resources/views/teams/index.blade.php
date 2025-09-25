<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team List</title>
    <link rel="stylesheet" href="{{ asset('css/teams.css') }}">
</head>
<body style="text-align: center">
    <div class="links" style="display: flex; width: ;">
        <form action="{{ route('teams.index') }}" method="GET">
            <button type="submit" class="btn">View Teams</button>
        </form>

        <form action="{{ route('match.index') }}" method="GET">
            <button type="submit" class="btn">Matches</button>
        </form>

        <form action="{{ route('ranking.index') }}" method="GET">
            <button type="submit" class="btn">Rankings</button>
        </form>
    </div>
    @if(session('success'))
    <div style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
    @endif
    <h1>Here is the list of all the teams</h1>

    <div class="teams">
        @foreach ($teams as $team)
            <div class="team-card">
                <h2>{{ $team->name }}</h2>
                <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}" width="200">
                <p>{{ $team->description }}</p>
                <h4>{{ $team->city }}</h4>
                <div class="aLinks">
                    <a href="{{ route('teams.edit', $team->id) }}">Edit</a><br>
                    <a href="{{ route('teams.delete', $team->id) }}">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
    
</body>
</html>