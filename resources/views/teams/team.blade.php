<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <h1>Contact Us</h1>

    <form method="POST" action="{{route('teams.store')}}" enctype="multipart/form-data">
        @csrf 
        <label for="name">Name:</label><br>
        <input type="text" id='name' name='name' value="{{old('name')}}"><br>
        @error('name') <p style="color:red">{{$message}}</p>@enderror

        <label for="description">Description:</label><br>
        <textarea name="description" id="description">{{old('description')}}</textarea>

        <label for="logo">Upload Logo::</label><br>
        <input type="file" id='logo' name="logo" accept="image/*"/><br>
        @error('name') <p style="color:red">{{$message}}</p>@enderror

        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" value="{{old('city')}}">

        <button type="submit">Upload</button>
    </form>
</body>
</html>






