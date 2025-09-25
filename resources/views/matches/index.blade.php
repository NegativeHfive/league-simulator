<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/match.css') }}">
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

        <form action="{{ route('match.generateMatch') }}" method="POST">
            @csrf
            <button type="submit" class="btn">Generate</button>
        </form>

        <form action="{{ route('match.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete all matches?')" class="btn">
                Delete All 
            </button>
        </form>

        
        <form action="{{ route('ranking.calculateRankings') }}" method="POST">
            @csrf
            <button type="submit" class="btn">Rankings</button>
        </form>
    </div>

    <h1>All Matches</h1>
    @if(session('success'))
        <p style="color:green">{{session('success')}}</p>
    @endif

   <div class="fixtures">
    @foreach($matches as $match)
        <div class="match-row">
            <!-- Team 1 -->
            <div class="team">
                @if($match->team1->logo)
                    <img src="{{ asset('storage/' . $match->team1->logo) }}" alt="{{ $match->team1->name }}">
                @endif
                <span class="team-name">{{ $match->team1->name }}</span>
            </div>

            <!-- Score -->
            <div class="score">
                {{ $match->team1score }} - {{ $match->team2score }}
            </div>

            <!-- Team 2 -->
            <div class="team">
                <span class="team-name">{{ $match->team2->name }}</span>
                @if($match->team2->logo)
                    <img src="{{ asset('storage/' . $match->team2->logo) }}" alt="{{ $match->team2->name }}">
                @endif
            </div>
        </div>
    @endforeach
</div>
   
</body>
</html>