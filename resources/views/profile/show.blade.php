@extends('layouts.app')

@section('content')
    <h1>{{ $profile->username ?? 'Geen gebruikersnaam opgegeven' }}</h1>
    @if($profile->profile_picture)
        <img src="{{ asset('storage/' . $profile->profile_picture) }}" alt="Profielfoto" class="h-24 w-24 rounded-full object-cover">
    @else
        <p>Geen profielfoto beschikbaar</p>
    @endif
    <p><strong>Verjaardag:</strong> {{ $profile->birthday ?? 'Niet opgegeven' }}</p>
    <p><strong>Over mij:</strong> {{ $profile->about_me ?? 'Geen informatie beschikbaar' }}</p>
@endsection
