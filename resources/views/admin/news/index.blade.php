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

        .news-admin-container {
            max-width: 800px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .news-admin-container h1 {
            text-align: center;
            margin-bottom: 1em;
            color: var(--primary-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75em 1.5em;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1em;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 1.5em;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #357ABD;
        }

        .news-list {
            list-style: none;
            padding: 0;
        }

        .news-item {
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

        .news-item .title {
            font-size: 1em;
            font-weight: bold;
            color: var(--text-color);
        }

        .news-item .actions {
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

    <div class="news-admin-container">
        <h1>📰 Nieuwsitems Beheer</h1>
        <a href="{{ route('admin.news.create') }}" class="btn-primary">➕ Nieuw Nieuwsitem</a>
        <ul class="news-list">
            @foreach ($newsItems as $news)
                <li class="news-item">
                    <span class="title">📄 {{ $news->title }}</span>
                    <div class="actions">
                        <a href="{{ route('admin.news.edit', $news->id) }}">✏️ Bewerken</a>
                        <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">🗑️ Verwijderen</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
