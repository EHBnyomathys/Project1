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

        .contact-messages-container {
            max-width: 800px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-messages-container h1 {
            text-align: center;
            margin-bottom: 1em;
            color: var(--primary-color);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5em;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 0.75em;
            text-align: left;
        }

        table th {
            background-color: var(--primary-color);
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .actions {
            display: flex;
            gap: 0.5em;
        }

        .actions a {
            text-decoration: none;
            color: var(--primary-color);
            font-weight: bold;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .actions form {
            display: inline-block;
        }

        .actions button {
            background-color: #E74C3C;
            color: white;
            border: none;
            border-radius: var(--border-radius);
            padding: 0.5em 1em;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .actions button:hover {
            background-color: #C0392B;
        }
    </style>

    <div class="contact-messages-container">
        <h1>📬 Contactberichten</h1>
        <table>
            <thead>
                <tr>
                    <th>👤 Naam</th>
                    <th>📧 Email</th>
                    <th>📝 Onderwerp</th>
                    <th>⚙️ Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td class="actions">
                            <a href="{{ route('admin.contact_messages.show', $message->id) }}">👁️ Bekijk</a>
                            <form action="{{ route('admin.contact_messages.destroy', $message->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">🗑️ Verwijder</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
