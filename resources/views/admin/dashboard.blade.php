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

        .admin-container {
            max-width: 800px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-container h1, .admin-container h2 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 1em;
        }

        .admin-container p {
            text-align: center;
            color: var(--text-color);
            margin-bottom: 2em;
        }

        .user-list {
            list-style: none;
            padding: 0;
        }

        .user-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            padding: 1em;
            margin-bottom: 1em;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .user-item span {
            font-size: 1em;
            font-weight: bold;
            color: var(--text-color);
        }

        .user-actions form {
            display: inline-block;
        }

        .user-actions button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            padding: 0.5em 1em;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .user-actions button:hover {
            background-color: #357ABD;
        }

        .user-actions .remove-admin {
            background-color: #E74C3C;
        }

        .user-actions .remove-admin:hover {
            background-color: #C0392B;
        }
    </style>

    <div class="admin-container">
        <h1>🔑 User Machten Beheren</h1>
        <p>🛡️ Alleen beheerders kunnen deze pagina bekijken en gebruikersrechten aanpassen.</p>

        <h2>👥 Gebruikerslijst</h2>
        <ul class="user-list">
            @foreach ($users as $user)
                <li class="user-item">
                    <span>{{ $user->name }} - {{ ucfirst($user->role) }}</span>
                    <div class="user-actions">
                        @if ($user->role !== 'admin')
                            <form method="POST" action="{{ route('admin.makeAdmin', $user->id) }}">
                                @csrf
                                <button type="submit">🚀 Maak Admin</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.removeAdmin', $user->id) }}">
                                @csrf
                                <button type="submit" class="remove-admin">🗑️ Verwijder Admin</button>
                            </form>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
