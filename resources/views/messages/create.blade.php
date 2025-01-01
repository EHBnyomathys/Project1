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

        .message-form-container {
            max-width: 600px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .message-form-container h1 {
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

        .form-group select, .form-group textarea {
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

        .form-group select:focus, .form-group textarea:focus {
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

    <div class="message-form-container">
        <h1>📨 Nieuw Bericht</h1>
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="receiver_id">👤 Ontvanger:</label>
                <select name="receiver_id" required>
                    <option value="">-- Kies een ontvanger --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->username ?? $user->name ?? 'Onbekende gebruiker' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="content">💬 Bericht:</label>
                <textarea name="content" required></textarea>
            </div>

            <button type="submit" class="btn-primary">🚀 Verstuur</button>
        </form>
    </div>
@endsection
