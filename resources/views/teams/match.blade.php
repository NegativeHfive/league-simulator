<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('matches.generateFixtures') }}" method="POST">
        @csrf
        <button type="submit">Generate Fixtures</button>
    </form>

    <form action="{{ route('match.delete') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete all matches?')">
            Delete All Matches
        </button>
    </form>
</body>
</html>