@extends('layouts.app')

@section('content')
    <style>
        /* Algemene stijlen */
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #F5F5F5;
            --text-color: #333;
            --border-radius: 8px;
        }

        .faq-container {
            max-width: 800px;
            margin: 2em auto;
            padding: 1em;
        }

        .faq-header {
            text-align: center;
            margin-bottom: 2em;
        }

        .faq-header h1 {
            font-size: 2em;
            color: var(--primary-color);
        }

        /* Admin Sectie */
        .admin-section {
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            margin: 2em auto;
            padding: 1.5em;
            text-align: center;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-section h2 {
            margin-bottom: 1em;
            color: var(--primary-color);
        }

        .admin-buttons {
            display: flex;
            justify-content: center;
            gap: 1em;
            margin-top: 1em;
        }

        .admin-buttons a {
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            padding: 0.5em 1em;
            border-radius: var(--border-radius);
            transition: background-color 0.2s;
        }

        .admin-buttons a:hover {
            background-color: #357ABD;
        }

        .card {
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5em;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-size: 1.2em;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 0.75em;
        }

        .card-body {
            padding: 1em;
        }

        .card-body h5 {
            font-size: 1.1em;
            font-weight: bold;
        }

        .card-body p {
            margin: 0.5em 0;
        }

        .card-body hr {
            margin: 1em 0;
        }

        .alert {
            text-align: center;
            padding: 1em;
            border-radius: var(--border-radius);
        }
    </style>

    <div class="faq-container">
        <div class="faq-header">
            <h1>❓ Veelgestelde Vragen (FAQ)</h1>
        </div>

        @auth
        @if (auth()->user()->isAdmin())
            <div class="admin-section">
                <h2>🛠️ Beheerdersopties</h2>
                <div class="admin-buttons">
                    <a href="{{ route('faq.create') }}">➕ FAQ Aanmaken</a>
                </div>
            </div>
        @endif
        @endauth

        @forelse ($categories as $category)
            <div class="card">
                <div class="card-header">
                    📚 {{ $category->name }}
                </div>
                <div class="card-body">
                    @forelse ($category->faqs as $faq)
                        <div class="mb-3">
                            <h5>{{ $faq->question }}</h5>
                            <p>{{ $faq->answer }}</p>
                        </div>
                        @if (!$loop->last)
                            <hr>
                        @endif
                    @empty
                        <p class="text-muted">⚠️ Geen vragen beschikbaar in deze categorie.</p>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="alert alert-warning">
                🚫 Er zijn momenteel geen FAQ-categorieën beschikbaar.
            </div>
        @endforelse
    </div>
@endsection
