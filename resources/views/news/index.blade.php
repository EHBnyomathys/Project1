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

        .news-container {
            max-width: 800px;
            margin: 2em auto;
            padding: 1em;
        }

        .news-header {
            text-align: center;
            margin-bottom: 2em;
        }

        .news-header h1 {
            font-size: 2em;
            color: var(--primary-color);
        }

        /* Admin Sectie */
        .admin-section {
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            margin: 2em auto;
            padding: 1.5em;
            text-align: center;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-section h2 {
            margin-bottom: 1em;
            color: var(--primary-color);
        }

        .admin-buttons {
            display: flex;
            justify-content: center;
            gap: 1em;
            margin-top: 1em;
        }

        .admin-buttons a {
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            padding: 0.5em 1em;
            border-radius: var(--border-radius);
            transition: background-color 0.2s;
        }

        .admin-buttons a:hover {
            background-color: #357ABD;
        }

        .news-item {
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            padding: 1.5em;
            margin-bottom: 1em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .news-item h2 {
            font-size: 1.5em;
            color: var(--primary-color);
        }

        .news-item p {
            margin: 0.5em 0;
        }

        .news-item a {
            text-decoration: none;
            color: var(--primary-color);
            font-weight: bold;
        }

        .news-item a:hover {
            text-decoration: underline;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2em;
        }
    </style>

    <div class="news-container">
        <div class="news-header">
            <h1>📰 Laatste Nieuws</h1>
        </div>

        @auth
        @if (auth()->user()->isAdmin())
            <div class="admin-section">
                <h2>🛠️ Beheerdersopties</h2>
                <div class="admin-buttons">
                    <a href="{{ route('admin.news.create') }}">➕ Nieuwsbericht Aanmaken</a>
                    <a href="{{ route('admin.news.create') }}">✏️ Nieuwsbericht Bewerken</a>
                    <a href="{{ route('admin.news.create') }}">✏️ Nieuwsbericht Verwijderen</a>
                    
                </div>
            </div>
        @endif
        @endauth

        @foreach ($newsItems as $news)
            <div class="news-item">
                <h2>{{ $news->title }}</h2>
                <p>📅 Gepubliceerd op: {{ $news->published_at }}</p>
                <p>{{ Str::limit($news->content, 150, '...') }}</p>
                <a href="{{ route('news.show', $news->id) }}">📖 Lees meer</a>
            </div>
        @endforeach

        <div class="pagination">
            {{ $newsItems->links() }}
        </div>
    </div>
@endsection
