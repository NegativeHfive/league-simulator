<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rankings</title>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
        <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">

</head>
<body>

    <div class="links" style="display: flex; width: 100%; justify-content: space-evenly; margin-top: 3%;">
        <form action="{{ route('dashboard') }}" method="GET">
            <button type="submit" class="btn">Home</button>
        </form>

        <form action="{{ route('teams.index') }}" method="GET">
            <button type="submit" class="btn">Teams</button>
        </form>

        <form action="{{ route('match.index') }}" method="GET">
            <button type="submit" class="btn">Matches</button>
        </form>

        <form action="{{ route('ranking.graph') }}" method="GET">
            <button type="submit" class="btn">Graph</button>
        </form>

        <form action="{{ route('ranking.delete') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete all matches?')" class="btn">
            Delete Ranking
        </button>
    </form>
        
    </div>
    
    
    <h1>Rankings</h1>
   <div class="ranking-container">
    <table class="ranking-table">
        <tr>
            <th>#</th>
            <th>Team</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Draws</th>
            <th>Points</th>
        </tr>
        @foreach($teams as $index => $ranking)
            <tr class="
                {{ $index == 0 ? 'first-place' : '' }}
                {{ $index >= count($teams) - 3 ? 'last-three' : '' }}
            ">
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($ranking->team->logo)
                        <img src="{{ asset('storage/' . $ranking->team->logo) }}" alt="{{ $ranking->team->name }}">
                    @endif
                    {{ $ranking->team->name }}
                </td>
                <td>{{ $ranking->wins }}</td>
                <td>{{ $ranking->losses }}</td>
                <td>{{ $ranking->draws }}</td>
                <td class="points"><strong>{{ $ranking->points }}</strong></td>
            </tr>
        @endforeach
    </table>
</div>


</body>
</html>