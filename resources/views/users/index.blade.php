@extends('layouts.app')

@section('content')
    <style>
        /* Algemene stijlen */
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #F5F5F5;
            --text-color: #333;
            --border-radius: 8px;
        }

        .user-list {
            display: flex;
            flex-wrap: wrap;
            gap: 1em;
            justify-content: center;
            padding: 1em;
            list-style: none;
        }

        .user-card {
            background-color: var(--secondary-color);
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
            padding: 1em;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .user-card a {
            text-decoration: none;
            color: var(--primary-color);
            font-weight: bold;
        }

        .user-card .username {
            font-size: 1.2em;
            margin: 0.5em 0;
        }

        .user-card .status {
            font-size: 0.9em;
            color: #777;
        }

        .no-profile {
            text-align: center;
            font-size: 1em;
            color: #999;
            margin-top: 2em;
        }
    </style>

    <h1 style="text-align: center; margin: 1em 0;">👥 Gebruikersoverzicht</h1>
    @auth
    @if (auth()->user()->isAdmin())
    <a href="{{ route('admin.dashboard') }}">Gebruikersbeheer ></a>
    <a href="{{ route('admin.createUser') }}">Gebruiker Aanmaken ></a>
    @endif
    @endauth
    <ul class="user-list">
        @foreach($users as $user)
            @if($user->profile)
                <li class="user-card">
                    <a href="{{ route('profile.show', $user->profile->username) }}">
                        <div class="username">{{ $user->profile->username ?? 'Geen gebruikersnaam' }}</div>
                        <div class="status">🌟 Actieve gebruiker</div>
                    </a>
                </li>
            @else
                <li class="user-card">
                    <div class="username">❌ Geen profiel</div>
                    <div class="status">🔒 Niet beschikbaar</div>
                </li>
            @endif
        @endforeach
    </ul>

    @if($users->isEmpty())
        <p class="no-profile">🚫 Geen gebruikers gevonden.</p>
    @endif
@endsection
