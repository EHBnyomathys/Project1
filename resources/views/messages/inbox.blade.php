@extends('layouts.app')

@section('content')
    <a href="{{ route('messages.create') }}">Nieuw bericht</a>
    <a href="{{ route('messages.sent') }}">Verzonden berichten</a>
    <h1>Inbox</h1>
    @foreach($messages as $message)
        <div>
            <p>
                <strong>Van:</strong> {{ $message->sender->username ?? $message->sender->name ?? 'Onbekende gebruiker' }} <br>
                <strong>Bericht:</strong> {{ Str::limit($message->content, 50) }}
            </p>
            <a href="{{ route('messages.show', $message->id) }}">Bekijk</a>
        </div>
        <hr>
    @endforeach
@endsection
