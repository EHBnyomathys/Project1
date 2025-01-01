@extends('layouts.app')

@section('content')
<h1>Contactberichten</h1>
<table>
    <tr>
        <th>Naam</th>
        <th>Email</th>
        <th>Onderwerp</th>
        <th>Acties</th>
    </tr>
    @foreach($messages as $message)
        <tr>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->subject }}</td>
            <td>
                <a href="{{ route('admin.contact_messages.show', $message->id) }}">Bekijk</a>
                <form action="{{ route('admin.contact_messages.destroy', $message->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijder</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
