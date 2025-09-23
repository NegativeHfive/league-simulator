<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rankings</title>
</head>
<body>
    
    <form action="{{ route('ranking.delete') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete all matches?')">
            Delete Ranking
        </button>
    </form>
    <h1>Rankings</h1>
    <table border="1" cellpadding='10'>
        <tr>
            <th></th>
            <th>Team</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Draws</th>
            <th>Points</th>
        </tr>
        @foreach($teams as $index => $ranking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($ranking->team->logo)
                        <img src="{{ asset('storage/' . $ranking->team->logo) }}" alt="{{ $ranking->team->name }}" width="30">
                    @endif
                    {{ $ranking->team->name }}
                </td>
                <td>{{ $ranking->wins }}</td>
                <td>{{ $ranking->losses }}</td>
                <td>{{ $ranking->draws }}</td>
                <td><strong>{{ $ranking->points }}</strong></td>
            </tr>
        @endforeach
    </table>


</body>
</html>