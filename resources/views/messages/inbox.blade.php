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

        .messages-container {
            max-width: 800px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .messages-container h1 {
            text-align: center;
            margin-bottom: 1em;
            color: var(--primary-color);
        }

        .messages-actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2em;
        }

        .messages-actions a {
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            padding: 0.5em 1em;
            border-radius: var(--border-radius);
            transition: background-color 0.2s;
        }

        .messages-actions a:hover {
            background-color: #357ABD;
        }

        .message-item {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            padding: 1em;
            margin-bottom: 1em;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .message-item p {
            margin: 0.5em 0;
        }

        .message-item strong {
            color: var(--primary-color);
        }

        .message-item a {
            text-decoration: none;
            color: var(--primary-color);
            font-weight: bold;
        }

        .message-item a:hover {
            text-decoration: underline;
        }

        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 1em 0;
        }
    </style>

    <div class="messages-container">
        <div class="messages-actions">
            <a href="{{ route('messages.create') }}">➕ Nieuw bericht</a>
            <a href="{{ route('messages.sent') }}">📤 Verzonden berichten</a>
        </div>

        <h1>📥 Inbox</h1>
        @foreach($messages as $message)
            <div class="message-item">
                <p><strong>👤 Van:</strong> {{ $message->sender->username ?? $message->sender->name ?? 'Onbekende gebruiker' }}</p>
                <p><strong>💬 Bericht:</strong> {{ Str::limit($message->content, 200) }}</p>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
