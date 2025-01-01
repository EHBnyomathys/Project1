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

        .profile-edit-container {
            max-width: 600px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-edit-container h1 {
            text-align: center;
            margin-bottom: 1em;
            color: var(--primary-color);
        }

        .form-group {
            margin-bottom: 1.5em;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5em;
            color: var(--text-color);
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.75em;
            border: 1px solid #ccc;
            border-radius: var(--border-radius);
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-group input[type="file"] {
            padding: 0.3em;
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75em 1.5em;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1em;
            cursor: pointer;
            display: block;
            width: 100%;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #357ABD;
        }
    </style>

    <div class="profile-edit-container">
        <h1>👤 Profiel Bewerken</h1>
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>🏷️ Gebruikersnaam:</label>
                <input type="text" name="username" value="{{ old('username', $profile->username) }}" required>
            </div>

            <div class="form-group">
                <label>🎂 Verjaardag:</label>
                <input type="date" name="birthday" value="{{ old('birthday', $profile->birthday) }}">
            </div>

            <div class="form-group">
                <label>🖼️ Profielfoto:</label>
                <input type="file" name="profile_picture">
            </div>

            <div class="form-group">
                <label>📝 Over mij:</label>
                <textarea name="about_me">{{ old('about_me', $profile->about_me) }}</textarea>
            </div>

            <button type="submit" class="btn-primary">💾 Opslaan</button>
        </form>
    </div>
@endsection
