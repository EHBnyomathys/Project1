@extends('layouts.app')

@section('content')
    <h1>{{ $newsItem->title }}</h1>
    <p>Gepubliceerd op: {{ $newsItem->published_at }}</p>

    @if ($newsItem->image)
        <div>
            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Afbeelding van {{ $newsItem->title }}" width="400">
        </div>
    @endif

    <p>{{ $newsItem->content }}</p>

    <a href="{{ route('news.index') }}">Terug naar nieuwsoverzicht</a>
@endsection
