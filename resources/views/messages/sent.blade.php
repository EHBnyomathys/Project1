@extends('layouts.app')

@section('content')
    <h1>Verzonden Berichten</h1>
    @foreach($messages as $message)
        <div>
            <p>
                <strong>Naar:</strong> {{ $message->receiver->username ?? $message->receiver->name ?? 'Onbekende gebruiker' }} <br>
                <strong>Bericht:</strong> {{ Str::limit($message->content, 50) }}
            </p>
        </div>
        <hr>
    @endforeach
@endsection
