@extends('layouts.app')

@section('content')
    <p>Hallo, {{ $user }}!</p>

    @auth
        <p>Je bent ingelogd als {{ Auth::user()->email }}</p>
    @else
        <p>Je bent momenteel niet ingelogd.</p>
    @endauth
@endsection
