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

        .news-item-container {
            max-width: 800px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .news-item-container h1 {
            font-size: 2em;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 1em;
        }

        .news-item-container p.date {
            font-size: 0.9em;
            color: #777;
            text-align: center;
            margin-bottom: 1.5em;
        }

        .news-item-container img {
            display: block;
            max-width: 100%;
            height: auto;
            border-radius: var(--border-radius);
            margin: 1em auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .news-item-container p.content {
            font-size: 1em;
            line-height: 1.6;
            color: var(--text-color);
            margin-bottom: 2em;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 2em;
        }

        .back-link a {
            text-decoration: none;
            background-color: var(--primary-color);
            color: white;
            padding: 0.5em 1em;
            border-radius: var(--border-radius);
            transition: background-color 0.2s;
        }

        .back-link a:hover {
            background-color: #357ABD;
        }
    </style>

    <div class="news-item-container">
        <h1>📰 {{ $newsItem->title }}</h1>
        <p class="date">📅 Gepubliceerd op: {{ $newsItem->published_at }}</p>

        @if ($newsItem->image)
            <div>
                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Afbeelding van {{ $newsItem->title }}">
            </div>
        @endif

        <p class="content">{{ $newsItem->content }}</p>

        <div class="back-link">
            <a href="{{ route('news.index') }}">⬅️ Terug naar nieuwsoverzicht</a>
        </div>
    </div>
@endsection
