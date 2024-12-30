@extends('layouts.app')

@section('content')
    <h1>Nieuwsitem Bewerken</h1>

    <form action="{{ route('admin.news.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Titel:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $newsItem->title) }}" required>
            @error('title')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label for="image">Afbeelding (huidige afbeelding wordt behouden indien geen nieuwe wordt geüpload):</label>
            <input type="file" name="image" id="image" accept="image/*">
            @if ($newsItem->image)
                <p>Huidige afbeelding:</p>
                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Huidige afbeelding" width="200">
            @endif
            @error('image')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label for="content">Inhoud:</label>
            <textarea name="content" id="content" rows="5" required>{{ old('content', $newsItem->content) }}</textarea>
            @error('content')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label for="published_at">Publicatiedatum:</label>
            <input type="date" name="published_at" id="published_at" value="{{ old('published_at', $newsItem->published_at) }}" required>
            @error('published_at')<div>{{ $message }}</div>@enderror
        </div>

        <button type="submit">Nieuwsitem Bijwerken</button>
        <a href="{{ route('admin.news.index') }}">Annuleren</a>
    </form>
@endsection
