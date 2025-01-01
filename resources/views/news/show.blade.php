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
            margin-bottom: 0.5em;
        }

        .news-item-container img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            margin-bottom: 1em;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .news-item-container p {
            margin-bottom: 1em;
            font-size: 1em;
            color: var(--text-color);
        }

        .news-item-container small {
            color: #777;
        }

        .comments-section {
            margin-top: 2em;
        }

        .comments-section h3 {
            margin-bottom: 1em;
            color: var(--primary-color);
        }

        .comment-form {
            margin-bottom: 2em;
        }

        .comment-form label {
            display: block;
            margin-bottom: 0.5em;
            font-weight: bold;
        }

        .comment-form textarea {
            width: 100%;
            padding: 0.75em;
            border: 1px solid #ccc;
            border-radius: var(--border-radius);
            resize: vertical;
            margin-bottom: 1em;
        }

        .comment-form button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5em 1em;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .comment-form button:hover {
            background-color: #357ABD;
        }

        .comment {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            padding: 1em;
            margin-bottom: 1em;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .comment strong {
            color: var(--primary-color);
        }

        .comment small {
            color: #777;
            display: block;
            margin-top: 0.5em;
        }

        .comment form button {
            background-color: #E74C3C;
            color: white;
            border: none;
            padding: 0.3em 0.6em;
            border-radius: var(--border-radius);
            font-size: 0.9em;
            cursor: pointer;
            margin-top: 0.5em;
            transition: background-color 0.2s;
        }

        .comment form button:hover {
            background-color: #C0392B;
        }

        .login-prompt {
            text-align: center;
            margin-top: 1em;
        }

        .login-prompt a {
            color: var(--primary-color);
            font-weight: bold;
            text-decoration: none;
        }

        .login-prompt a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="news-item-container">
        <h1>📰 {{ $newsItem->title }}</h1>
        @if ($newsItem->image)
            <div>
                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Afbeelding van {{ $newsItem->title }}">
            </div>
        @endif
        <p>{{ $newsItem->content }}</p>
        <p><small>📅 Gepubliceerd op: {{ $newsItem->created_at->format('d-m-Y') }}</small></p>
    </div>

    <div class="comments-section">
        <h3>💬 Opmerkingen</h3>
        @auth
            <form action="{{ route('comments.store', $newsItem->id) }}" method="POST" class="comment-form">
                @csrf
                <label for="content">📝 Jouw commentaar:</label>
                <textarea name="content" id="content" rows="3" required></textarea>
                <button type="submit">🚀 Verstuur Commentaar</button>
            </form>
        @endauth

        @guest
            <p class="login-prompt">🔒 <a href="{{ route('login') }}">Log in</a> om een commentaar achter te laten.</p>
        @endguest

        <h4>📖 Alle opmerkingen:</h4>
        @foreach($newsItem->comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->user->username }}:</strong> {{ $comment->content }}</p>
                <small>🕒 {{ $comment->created_at->format('d-m-Y H:i') }}</small>
                @if(auth()->user() && (auth()->user()->id === $comment->user_id || auth()->user()->is_admin))
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">🗑️ Verwijder</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endsection
