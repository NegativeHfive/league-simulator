<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team List</title>
</head>
<body>
    <h1>Here is the list of all the teams</h1>

    <ul>
        @foreach ($teams as $team)
            <li>
                <p>{{$team->name}}</p>
                <img src="{{asset('storage/' .$team->logo)}}" alt="{{$team->name}} width='200'">
                <p>{{$team->description}}</p>
                <p>{{$team->city}}</p>
                <a href="{{route('teams.edit', $team->id)}}">Edit</a>
                
                <form action="{{route('teams.delete', $team->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete? ')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    
</body>
</html>