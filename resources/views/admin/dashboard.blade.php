@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User machten beheren</h1>
        <p>Alleen admins kunnen deze pagina zien.</p>

        <h2>Gebruikerslijst</h2>
        <ul>
            @foreach ($users as $user)
                <li>
                    {{ $user->name }} - {{ $user->role }}
                    @if ($user->role !== 'admin')
                        <form method="POST" action="{{ route('admin.makeAdmin', $user->id) }}">
                            @csrf
                            <button type="submit">Maak Admin</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.removeAdmin', $user->id) }}">
                            @csrf
                            <button type="submit">Verwijder Admin</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection
