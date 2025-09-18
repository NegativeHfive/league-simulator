<h1>Edit Team</h1>

<form action="{{route('teams.update', $team->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" name='name' value="{{old('name', $team->name)}}"><br>

    <label for="description">Description</label>
    <textarea name="description" id="description">{{old('description', $team->description)}}</textarea><br>

    <label for="city">City</label>
    <input type="text" name='city' value="{{old('city', $team->city)}}"><br>

    <label for="logo">Logo</label>
    <input type="file" name='logo'>

    @if($team->logo)
        <div>
            <p>Current Logo</p>
            <img src="{{asset('storage/'. $team->logo)}}" alt="" width="150">
        </div>
    @endif

    <button type="submit">Update</button>


</form>