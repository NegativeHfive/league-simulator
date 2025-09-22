<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form action="{{ route('match.generateMatch') }}" method="POST">
        @csrf
        <button type="submit">Generate Fixtures</button>
    </form><br>

     <form action="{{ route('match.delete') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete all matches?')">
            Delete All Matches
        </button>
    </form>

    <h1>All Matches</h1>
    @if(session('success'))
        <p style="color:green">{{session('success')}}</p>
    @endif

    @foreach($matches as $match)
    <div style="margin-bottom: 20px; padding: 10px; border: 1px solid #ccc;">
        <div style="display: flex; align-items: center; justify-content: space-evenly; width: 100%;">
            
            <!-- Team 1 -->
            <div style="text-align: center;">
                @if($match->team1->logo)
                    <img src="{{ asset('storage/' . $match->team1->logo) }}" alt="{{ $match->team1->name }}" width="50">
                @endif
                <p>{{ $match->team1->name }}</p>
            </div>

            <!-- Score -->
            <div style="text-align: center; align-items: center;">
                <strong>{{ $match->team1score }} - {{ $match->team2score }}</strong>
                <p>Points: {{ $match->team1points }} - {{ $match->team2points }}</p>
            </div>

            <!-- Team 2 -->
            <div style="text-align: center; align-items: center;">
                @if($match->team2->logo)
                    <img src="{{ asset('storage/' . $match->team2->logo) }}" alt="{{ $match->team2->name }}" width="50">
                @endif
                <p>{{ $match->team2->name }}</p>
            </div>

        </div>
    </div>
@endforeach

   
</body>
</html>