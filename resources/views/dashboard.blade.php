@extends('layouts.app')

@section('content')
    <style>
        .banner {
            background-image: url('boeken.jpg');
            width: 100%;
            height: 200px;
            font-size: 5em;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }
        .moto {
            margin-left: 1em;
            margin-top: 0.5em;
            font-size: 1.5em;
        }
        .onderste {
            background-color:rgb(201, 201, 201);
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin: 1em;
            padding: 1em;
            border-radius: 10px;
        }
        .links {
            border: 2px solid black;
            padding: 0.2em;
            font-size: 2em;
            border-radius: 10px;
        }
        .login {
            border: 2px solid black;
            border-radius: 10px;
            margin-bottom: 0.1em;
            text-align: center;

        }
        .register {
            border: 2px solid black;
            border-radius: 10px;
            text-align: center;

        }
        .midden {
            border: 2px solid black;
            padding: 1em;
            align-self: center;
            font-size: 2em;
            border-radius: 10px;
            
        }
        .rechts {
            border: 2px solid black;
            padding: 1em;
            align-self: center;
            font-size: 2em;
            border-radius: 10px;

        }
        
    </style>

    <h1 class="banner">Boekenclub Anderlecht</h1>
    <p class="moto">Ontdek een wereld van verhalen en deel jouw passie voor lezen met anderen.</p>

    <div class="onderste">

        @guest
        <div class="links">
            <div class="login"><a href="{{ route('login') }}">Inloggen ></a></div>
            <div class="register"><a href="{{ route('register') }}">Registreren ></a></div>
        </div>
        @endguest

        <div class="midden">
            <a href="{{ route('news.index') }}">Nieuws ></a>
        </div>
        <div class="rechts">
            <a href="{{ route('faq.index') }}">FAQ ></a>
        </div>
    </div>
@endsection
