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

        .news-form-container {
            max-width: 600px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .news-form-container h1 {
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

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 0.75em;
            border: 1px solid #ccc;
            border-radius: var(--border-radius);
            box-sizing: border-box;
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-group img {
            display: block;
            margin-top: 1em;
            max-width: 200px;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group .error {
            color: #E74C3C;
            font-size: 0.9em;
            margin-top: 0.25em;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2em;
        }

        .form-actions button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            padding: 0.75em 1.5em;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .form-actions button:hover {
            background-color: #357ABD;
        }

        .form-actions a {
            text-decoration: none;
            color: var(--primary-color);
            font-weight: bold;
        }

        .form-actions a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="news-form-container">
        <h1>📝 Nieuwsitem Bewerken</h1>
        <form action="{{ route('admin.news.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">🏷️ Titel:</label>
                <input type="text" name="title" id="title" value="{{ old('title', $newsItem->title) }}" required>
                @error('title')<div class="error">⚠️ {{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="image">🖼️ Afbeelding (huidige afbeelding blijft behouden als er geen nieuwe wordt geüpload):</label>
                <input type="file" name="image" id="image" accept="image/*">
                @if ($newsItem->image)
                    <p>📷 Huidige afbeelding:</p>
                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Huidige afbeelding">
                @endif
                @error('image')<div class="error">⚠️ {{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="content">📝 Inhoud:</label>
                <textarea name="content" id="content" rows="5" required>{{ old('content', $newsItem->content) }}</textarea>
                @error('content')<div class="error">⚠️ {{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="published_at">📅 Publicatiedatum:</label>
                <input type="date" name="published_at" id="published_at" value="{{ old('published_at', $newsItem->published_at) }}" required>
                @error('published_at')<div class="error">⚠️ {{ $message }}</div>@enderror
            </div>

            <div class="form-actions">
                <button type="submit">✅ Bijwerken</button>
                <a href="{{ route('admin.news.index') }}">❌ Annuleren</a>
            </div>
        </form>
    </div>
@endsection
