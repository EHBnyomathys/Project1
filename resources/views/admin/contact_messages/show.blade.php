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

        .message-container {
            max-width: 700px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .message-container h1 {
            text-align: center;
            margin-bottom: 1em;
            color: var(--primary-color);
        }

        .message-container p {
            margin-bottom: 1em;
            font-size: 1em;
            color: var(--text-color);
        }

        .message-container p strong {
            color: var(--primary-color);
        }

        .admin-reply {
            margin-top: 2em;
        }

        .admin-reply label {
            display: block;
            margin-bottom: 0.5em;
            font-weight: bold;
            color: var(--text-color);
        }

        .admin-reply textarea {
            width: 100%;
            min-height: 150px;
            padding: 0.75em;
            border: 1px solid #ccc;
            border-radius: var(--border-radius);
            resize: vertical;
            box-sizing: border-box;
        }

        .admin-reply textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }

        .btn-submit {
            margin-top: 1em;
            background-color: var(--primary-color);
            color: white;
            padding: 0.75em 1.5em;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-submit:hover {
            background-color: #357ABD;
        }

        .back-link {
            margin-top: 2em;
            text-align: center;
        }

        .back-link a {
            text-decoration: none;
            color: var(--primary-color);
            font-weight: bold;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="message-container">
        <h1>📨 Bericht van {{ $message->name }}</h1>
        <p><strong>📧 Email:</strong> {{ $message->email }}</p>
        <p><strong>📝 Onderwerp:</strong> {{ $message->subject }}</p>
        <p><strong>💬 Bericht:</strong> {{ $message->message }}</p>

        @if(!$message->is_replied)
            <div class="admin-reply">
                <form action="{{ route('admin.contact_messages.update', $message->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="admin_reply">📝 Antwoord:</label>
                    <textarea name="admin_reply" id="admin_reply" required></textarea>
                    <button type="submit" class="btn-submit">✅ Verstuur Antwoord</button>
                </form>
            </div>
        @else
            <p><strong>✅ Antwoord:</strong> {{ $message->admin_reply }}</p>
        @endif

        <div class="back-link">
            <a href="{{ route('admin.contact_messages.index') }}">⬅️ Terug naar overzicht</a>
        </div>
    </div>
@endsection
