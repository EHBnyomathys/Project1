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

        .profile-container {
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            padding: 2em;
            max-width: 600px;
            margin: 2em auto;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
            margin-bottom: 1em;
        }

        .profile-username {
            font-size: 1.8em;
            font-weight: bold;
            color: var(--primary-color);
        }

        .profile-details {
            margin-top: 1em;
            text-align: left;
        }

        .profile-details p {
            font-size: 1em;
            margin: 0.5em 0;
        }

        .profile-details strong {
            color: var(--primary-color);
        }

        .no-info {
            font-style: italic;
            color: #777;
        }

        .no-picture {
            font-size: 0.9em;
            color: #999;
        }
    </style>

    <div class="profile-container">
        <h1 class="profile-username">👤 {{ $profile->username ?? 'Geen gebruikersnaam opgegeven' }}</h1>
        @if($profile->profile_picture)
            <img src="{{ asset('storage/' . $profile->profile_picture) }}" alt="Profielfoto" class="profile-picture">
        @else
            <p class="no-picture">🖼️ Geen profielfoto beschikbaar</p>
        @endif
        <div class="profile-details">
            <p><strong>🎂 Verjaardag:</strong> {{ $profile->birthday ?? 'Niet opgegeven' }}</p>
            <p><strong>📝 Over mij:</strong> {{ $profile->about_me ?? 'Geen informatie beschikbaar' }}</p>
        </div>
    </div>
@endsection
