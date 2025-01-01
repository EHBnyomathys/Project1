@extends('layouts.app')

@section('content')
<h1>Bericht van {{ $message->name }}</h1>
<p><strong>Email:</strong> {{ $message->email }}</p>
<p><strong>Onderwerp:</strong> {{ $message->subject }}</p>
<p><strong>Bericht:</strong> {{ $message->message }}</p>

@if(!$message->is_replied)
    <form action="{{ route('admin.contact_messages.update', $message->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="admin_reply">Antwoord:</label>
        <textarea name="admin_reply" required></textarea>
        <button type="submit">Verstuur Antwoord</button>
    </form>
@else
    <p><strong>Antwoord:</strong> {{ $message->admin_reply }}</p>
@endif

<a href="{{ route('admin.contact_messages.index') }}">Terug naar overzicht</a>
@endsection
