@extends('layouts.app')

@section('content')
<h1>Profiel bewerken</h1>

<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    <label>Username:</label>
    <input type="text" name="username" value="{{ old('username', $profile->username) }}" required><br>

    <label>Verjaardag:</label>
    <input type="date" name="birthday" value="{{ old('birthday', $profile->birthday) }}"><br>

    <label>Profielfoto:</label>
    <input type="file" name="profile_picture"><br>

    <label>Over mij:</label>
    <textarea name="about_me">{{ old('about_me', $profile->about_me) }}</textarea><br>

    <button type="submit">Opslaan</button>
</form>
@endsection
