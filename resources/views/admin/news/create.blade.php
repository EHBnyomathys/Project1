@extends('layouts.app')

@section('content')
    <h1>Nieuw Nieuwsitem Toevoegen</h1>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Titel:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            @error('title')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label for="image">Afbeelding:</label>
            <input type="file" name="image" id="image" accept="image/*">
            @error('image')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label for="content">Inhoud:</label>
            <textarea name="content" id="content" rows="5" required>{{ old('content') }}</textarea>
            @error('content')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label for="published_at">Publicatiedatum:</label>
            <input type="date" name="published_at" id="published_at" value="{{ old('published_at') }}" required>
            @error('published_at')<div>{{ $message }}</div>@enderror
        </div>

        <button type="submit">Nieuwsitem Opslaan</button>
        <a href="{{ route('admin.news.index') }}">Annuleren</a>
    </form>
@endsection
