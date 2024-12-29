@extends('layouts.app')

@section('content')
        @foreach($users as $user)
            @if($user->profile)
                <li>
                    <a href="{{ route('profile.show', $user->profile->username) }}">
                        {{ $user->profile->username ?? 'Geen gebruikersnaam' }}
                    </a>
                </li>
            @else
                <li>Gebruiker zonder profiel</li>
            @endif
        @endforeach
    </ul>
@endsection
