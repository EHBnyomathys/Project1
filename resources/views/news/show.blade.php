@extends('layouts.app')

@section('content')
    <h1>{{ $newsItem->title }}</h1>
    <p>{{ $newsItem->content }}</p>
    <p><small>Gepubliceerd op: {{ $newsItem->created_at->format('d-m-Y') }}</small></p>

    <h3>Opmerkingen</h3>
    @auth
        <form action="{{ route('comments.store', $newsItem->id) }}" method="POST">
            @csrf
            <label for="content">Jouw commentaar:</label>
            <textarea name="content" id="content" rows="3" required></textarea>
            <button type="submit">Verstuur Commentaar</button>
        </form>
    @endauth

    @guest
        <p><a href="{{ route('login') }}">Log in</a> om een commentaar achter te laten.</p>
    @endguest

    <h4>Alle opmerkingen:</h4>
    @foreach($newsItem->comments as $comment)
        <div>
            <p><strong>{{ $comment->user->username }}:</strong> {{ $comment->content }}</p>
            <p><small>{{ $comment->created_at->format('d-m-Y H:i') }}</small></p>
            @if(auth()->user() && (auth()->user()->id === $comment->user_id || auth()->user()->is_admin))
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijder</button>
                </form>
            @endif
        </div>
    @endforeach
@endsection
