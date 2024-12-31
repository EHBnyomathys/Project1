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

        .user-form-container {
            max-width: 600px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .user-form-container h1 {
            text-align: center;
            margin-bottom: 1em;
            color: var(--primary-color);
        }

        .form-group {
            margin-bottom: 1.5em;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5em;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
            padding: 0.75em;
            border: 1px solid #ccc;
            border-radius: var(--border-radius);
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }

        .form-group select {
            width: 100%;
            padding: 0.75em;
            border: 1px solid #ccc;
            border-radius: var(--border-radius);
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

    <div class="user-form-container">
        <h1>➕ Nieuwe Gebruiker Aanmaken</h1>
        <form method="POST" action="{{ route('admin.storeUser') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">👤 Naam</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">📧 Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">🔑 Wachtwoord</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="role" class="form-label">🛡️ Rol</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="user">👥 Gebruiker</option>
                    <option value="admin">🔧 Admin</option>
                </select>
            </div>
            <button type="submit" class="btn-primary">🚀 Aanmaken</button>
        </form>
    </div>
@endsection
