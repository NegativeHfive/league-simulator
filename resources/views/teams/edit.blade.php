<link rel="stylesheet" href="{{ asset('css/editForm.css') }}">
<div class="form-container">
    <h1>Edit Team</h1>
    <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name', $team->name) }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $team->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" value="{{ old('city', $team->city) }}">
        </div>

        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" name="logo">
        </div>

        @if($team->logo)
            <div class="current-logo">
                <p>Current Logo</p>
                <img src="{{ asset('storage/' . $team->logo) }}" alt="" width="100">
            </div>
        @endif

        <button type="submit" class="btn-submit">Update</button>
    </form>
</div>