@extends('layouts.app')

@section('content')
    <h1>Laatste Nieuws</h1>

    @foreach ($newsItems as $news)
        <div>
            <h2>{{ $news->title }}</h2>
            <p>Gepubliceerd op: {{ $news->published_at }}</p>
            <p>{{ Str::limit($news->content, 150, '...') }}</p>
            <a href="{{ route('news.show', $news->id) }}">Lees meer</a>
        </div>
        <hr>
    @endforeach

    <div>
        {{ $newsItems->links() }}
    </div>
@endsection
