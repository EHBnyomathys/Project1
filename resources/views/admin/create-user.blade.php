@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuwe Gebruiker Aanmaken</h1>
    <form method="POST" action="{{ route('admin.storeUser') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select class="form-control" name="role" id="role" required>
                <option value="user">Gebruiker</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Aanmaken</button>
    </form>
</div>
@endsection
