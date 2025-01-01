@extends('layouts.app')

@section('content')
    <h1>Nieuw Bericht</h1>
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <label for="receiver_id">Ontvanger:</label>
        <select name="receiver_id" required>
            <option value="">-- Kies een ontvanger --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->username ?? $user->name ?? 'Onbekende gebruiker' }}
                </option>
            @endforeach
        </select>

        <label for="content">Bericht:</label>
        <textarea name="content" required></textarea>
        <button type="submit">Verstuur</button>
    </form>
@endsection
